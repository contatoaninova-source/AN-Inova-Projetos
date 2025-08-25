// ======================
// ELEMENTOS DO DOM
// ======================
const daysGrid = document.getElementById('daysGrid');
const weekdaysWrap = document.getElementById('weekdays');
const monthTitle = document.getElementById('monthTitle');
const prevMonthBtn = document.getElementById('prevMonth');
const nextMonthBtn = document.getElementById('nextMonth');
const todayBtn = document.getElementById('todayBtn');
const timeGrid = document.getElementById('timeGrid');
const selectedInfo = document.getElementById('selectedInfo');
const confirmBtn = document.getElementById('confirmBtn');
const clearBtn = document.getElementById('clearBtn');
const alertArea = document.getElementById('alertArea');
const confirmModal = document.getElementById('confirmModal');
const modalDetails = document.getElementById('modalDetails');
const modalClose = document.getElementById('modalClose');
const modalWhatsapp = document.getElementById('modalWhatsapp');

// ======================
// ESTADO DO AGENDAMENTO
// ======================
let state = {
  viewYear: null,
  viewMonth: null,
  selectedDate: null,
  selectedTime: null,
  occupied: {} // horários ocupados carregados do backend
};

// ======================
// LISTAS
// ======================
const SLOT_LIST = [
  '08:00','08:30','09:00','09:30','10:00','10:30','11:00','11:30',
  '14:00','14:30','15:00','15:30','16:00','16:30','17:00'
];
const WEEKDAYS = ['Dom','Seg','Ter','Qua','Qui','Sex','Sáb'];

// ======================
// RENDERIZAÇÃO CABEÇALHO SEMANA
// ======================
WEEKDAYS.forEach(w => {
  const el = document.createElement('div');
  el.className = 'weekday';
  el.textContent = w;
  weekdaysWrap.appendChild(el);
});

// ======================
// INICIALIZAÇÃO
// ======================
(function init(){
  const now = new Date();
  state.viewYear = now.getFullYear();
  state.viewMonth = now.getMonth();
  fetchOccupied(); // pega horários ocupados do backend
  renderCalendar();
  renderTimeSlots();
})();

// ======================
// FUNÇÕES CALENDÁRIO
// ======================
function renderCalendar(){
  daysGrid.innerHTML = '';
  const first = new Date(state.viewYear, state.viewMonth, 1);
  const start = new Date(first);
  start.setDate(start.getDate() - first.getDay());
  monthTitle.textContent = first.toLocaleString('pt-BR',{month:'long', year:'numeric'});

  for(let i=0;i<42;i++){
    const d = new Date(start);
    d.setDate(start.getDate()+i);
    const iso = d.toISOString().slice(0,10);
    const isCurrentMonth = d.getMonth() === state.viewMonth;
    const isPast = d < new Date(new Date().setHours(0,0,0,0));
    const dayEl = document.createElement('button');
    dayEl.className = 'day';
    dayEl.textContent = d.getDate();
    dayEl.dataset.date = iso;
    if(!isCurrentMonth || isPast) dayEl.classList.add('disabled');
    if(iso === new Date().toISOString().slice(0,10)) dayEl.classList.add('today');
    if(!dayEl.classList.contains('disabled')) {
      dayEl.addEventListener('click',()=>selectDate(iso, dayEl));
    }
    daysGrid.appendChild(dayEl);
  }
}

// ======================
// SELECIONAR DATA
// ======================
function selectDate(iso, el){
  document.querySelectorAll('.day.selected').forEach(n=>n.classList.remove('selected'));
  el.classList.add('selected');
  state.selectedDate = iso;
  state.selectedTime = null;
  updateSummary();
  renderTimeSlots();
  updateConfirmBtn();
}

// ======================
// RENDERIZA HORÁRIOS
// ======================
function renderTimeSlots(){
  timeGrid.innerHTML = '';
  if(!state.selectedDate){
    timeGrid.innerHTML = '<div style="grid-column:1/-1;color:var(--muted);font-weight:600">Selecione uma data para ver horários</div>';
    return;
  }
  const occupied = state.occupied[state.selectedDate] || [];
  SLOT_LIST.forEach(time=>{
    const slot = document.createElement('button');
    slot.className = 'slot';
    slot.textContent = time;
    slot.dataset.time = time;
    if(occupied.includes(time)){
      slot.classList.add('occupied');
      slot.disabled = true;
    } else {
      slot.addEventListener('click',()=>selectTime(time, slot));
    }
    if(state.selectedTime === time) slot.classList.add('selected');
    timeGrid.appendChild(slot);
  });
}

// ======================
// SELECIONAR HORÁRIO
// ======================
function selectTime(time, el){
  document.querySelectorAll('.slot.selected').forEach(s=>s.classList.remove('selected'));
  el.classList.add('selected');
  state.selectedTime = time;
  updateSummary();
  updateConfirmBtn();
}

// ======================
// ATUALIZA RESUMO
// ======================
function updateSummary(){
  if(!state.selectedDate){
    selectedInfo.textContent='Selecione uma data e um horário';
    return;
  }
  const formatted = new Date(state.selectedDate).toLocaleDateString('pt-BR');
  const time = state.selectedTime || '—';
  selectedInfo.innerHTML = `<strong>${formatted}</strong><br>${time}`;
}

// ======================
// ATIVA OU DESATIVA BOTÃO CONFIRMAR
// ======================
function updateConfirmBtn(){
  if(state.selectedDate && state.selectedTime){
    confirmBtn.disabled = false;
    confirmBtn.setAttribute('aria-disabled','false');
  } else {
    confirmBtn.disabled = true;
    confirmBtn.setAttribute('aria-disabled','true');
  }
}

// ======================
// NAVEGAÇÃO MESES
// ======================
prevMonthBtn.onclick = ()=>{
  state.viewMonth--;
  if(state.viewMonth<0){state.viewMonth=11; state.viewYear--;}
  renderCalendar();
};
nextMonthBtn.onclick = ()=>{
  state.viewMonth++;
  if(state.viewMonth>11){state.viewMonth=0; state.viewYear++;}
  renderCalendar();
};
todayBtn.onclick = ()=>{
  const now = new Date();
  state.viewMonth = now.getMonth();
  state.viewYear = now.getFullYear();
  renderCalendar();
};

// ======================
// LIMPAR SELEÇÃO
// ======================
clearBtn.onclick = ()=>{
  state.selectedDate = null;
  state.selectedTime = null;
  document.querySelectorAll('.selected').forEach(n=>n.classList.remove('selected'));
  updateSummary();
  renderTimeSlots();
  updateConfirmBtn();
  alertArea.innerHTML='';
};

// ======================
// CONFIRMAR AGENDAMENTO (ENVIA PARA PHP)
// ======================
confirmBtn.onclick = ()=>{
  if(!state.selectedDate || !state.selectedTime){
    alertArea.innerHTML='<div class="alert alert-error">Selecione data e horário antes de confirmar.</div>';
    return;
  }
  const notes = document.getElementById('notes').value || '';

  fetch('salvar_agendamento.php',{
    method:'POST',
    headers:{'Content-Type':'application/json'},
    body:JSON.stringify({
      data: state.selectedDate,
      hora: state.selectedTime,
      observacoes: notes
    })
  })
  .then(res=>res.json())
  .then(data=>{
    if(data.sucesso){
      modalDetails.textContent = `Seu corte foi agendado para ${state.selectedDate} às ${state.selectedTime}`;
      confirmModal.classList.add('active');
      state.selectedDate = null;
      state.selectedTime = null;
      document.getElementById('notes').value='';
      renderCalendar();
      renderTimeSlots();
      updateSummary();
      updateConfirmBtn();
    } else {
      alertArea.innerHTML = `<div class="alert alert-error">${data.mensagem}</div>`;
    }
  })
  .catch(err=>{
    alertArea.innerHTML = '<div class="alert alert-error">Erro no servidor.</div>';
    console.error(err);
  });
};

// ======================
// MODAL
// ======================
modalClose.onclick = ()=>confirmModal.classList.remove('active');
modalWhatsapp.onclick = ()=>{
  const msg = encodeURIComponent(`Olá, gostaria de confirmar meu agendamento: ${modalDetails.textContent}`);
  const phone = '5511999999999';
  window.open(`https://wa.me/${phone}?text=${msg}`,'_blank');
};
document.addEventListener('keydown', e=>{
  if(e.key==='Escape' && confirmModal.classList.contains('active')) confirmModal.classList.remove('active');
});

// ======================
// FUNÇÃO PARA CARREGAR HORÁRIOS OCUPADOS DO BACKEND
// ======================
function fetchOccupied(){
  fetch('get_agendamentos.php')
    .then(res=>res.json())
    .then(data=>{
      state.occupied = data; // esperado: { '2025-08-25': ['08:00','09:00'] }
      renderCalendar();
      renderTimeSlots();
    })
    .catch(err=>console.error('Erro ao carregar horários ocupados:', err));
}
// ======================