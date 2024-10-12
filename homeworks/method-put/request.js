const API_URL = 'https://jsonplaceholder.typicode.com';

const queryString = window.location.search;

const urlParams = new URLSearchParams(queryString);

async function main() {
  if (urlParams.has('id')) {
    const id = urlParams.get('id');
    const element = await getElementById(id);

    if (element && element.length > 0) {
      setValueHTLM(element[0]);
      console.log('Elemento encontrado:', element[0]);
    } else {
      console.log('No se encontró ningún elemento con ese ID');
    }
  } else {
    console.log('El parámetro "id" no existe en la URL');
  }
}

// Función asíncrona para obtener el elemento por ID
async function getElementById(id) {
  try {
    const response = await fetch(`${API_URL}/posts?id=${id}`);
    if (response.ok) {
      return await response.json(); // Retorna el resultado de la promesa
    } else {
      console.error('Error en la respuesta de la API:', response.statusText);
    }
  } catch (error) {
    console.error('Error en la solicitud:', error);
  }
}

async function putElementById(data) {
  try {
    const response = await fetch(`${API_URL}/posts/${urlParams.get('id')}`, {
      method: 'PUT',
      headers: {
        'Content-Type': 'application/json',
      },
      body: data,
    });
    if (response.ok) {
      const responseData = await response.json();
      setValueHTLM(responseData);
      //return await response.json();
    } else {
      console.error('Error en la respuesta de la API:', response.statusText);
    }
  } catch (error) {
    console.error('Error en la solicitud:', error);
  }
}

function setValueHTLM(data) {
  const client = document.getElementById('client');
  const id = document.getElementById('id');
  const title = document.getElementById('title');
  const body = document.getElementById('body');
  client.innerHTML = data.userId.toString();
  id.innerHTML = data.id.toString();
  title.innerHTML = data.title.toString();
  body.innerHTML = data.body.toString();
}
main();

const form = document.getElementById('update');

form.addEventListener('submit', function (event) {
  event.preventDefault();

  const formData = new FormData(form);

  const dataObject = {};
  formData.forEach((value, key) => {
    dataObject[key] = value;
  });

  const jsonData = JSON.stringify(dataObject);
  putElementById(jsonData);
});
