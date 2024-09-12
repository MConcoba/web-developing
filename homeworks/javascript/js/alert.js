changeColorIcon('check-html', 'icon-html', '#E65100');
changeColorIcon('check-css', 'icon-css', '#0277BD');
changeColorIcon('check-js', 'icon-js', '#FFD600');

function onCheck(check) {
  const checkbox = document.getElementById(check);
  checkbox.checked = !checkbox.checked;

  checkbox.dispatchEvent(new Event('change'));
}

function changeColorIcon(check, icon, color) {
  document.getElementById(check).addEventListener('change', function () {
    if (this.checked) {
      document.getElementById(icon).style.color = color;
    } else {
      document.getElementById(icon).style.color = 'gray';
    }
  });
}

function showAlert() {
  let message = '';
  let title = '';
  let icon = '';
  if (document.getElementById('check-html').checked) {
    message += `<div class="cell boder-alert" >
          <i class="fab fa-html5 icon-alert" style="color: #E65100;"></i>
          <br />
          <code>HTML</code>
        </div>`;
  }
  if (document.getElementById('check-css').checked) {
    message += `<div class="cell boder-alert" >
          <i class="fab fa-css3-alt icon-alert" style="color: #0277BD;"></i>
          <br />
          <code> CSS </code>
        </div>`;
  }
  if (document.getElementById('check-js').checked) {
    message += `<div class="cell boder-alert center-third" >
          <i class="fab fa-js-square icon-alert" style="color: #FFD600;"></i>
          <br />
          <code>JavaScript</code>
        </div>`;
  }

  if (message !== '') {
    title = 'Cursos seleccionados';
    icon = 'success';
    message = `
          <div class="grid mx-5">
          ${message}
          </div>
          `;
  } else {
    title = 'Error';
    icon = 'error';
    message = 'No hay ningun curso seleccionado';
  }

  Swal.fire({
    title: `<strong>${title}</strong>`,
    icon: icon,
    html: message,
    width: icon === 'success' ? '45%' : '30%',
    showCloseButton: true,
    showCancelButton: true,
    focusConfirm: true,
    confirmButtonText: `Acceptar`,
    cancelButtonText: `Cancelar`,
  });
}
