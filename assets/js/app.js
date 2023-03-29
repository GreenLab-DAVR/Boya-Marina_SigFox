// Animación de carga

window.addEventListener('load', function(){

  carga();

  function carga(){
    document.getElementById('loading').className = 'visually-hidden';
    document.getElementById('content').classList.remove('visually-hidden');
  }
});

// Monitoreo de datos

// Tabla de datos

function datos() {
  $("#tabIndex").load("templates/tabla_index.php");
}

function datosCoordenadas() {
  $("#tabCoordenadas").load("templates/tabla_coordenadas.php");
}

setInterval(async () => {
  let res = await fetch("php/tabla.php");
  let dataT = await res.json();

  // console.log(data.length);
  setTimeout(async () => {
    try {
      let resa = await fetch("php/tabla.php");
      let dataa = await resa.json();
      if (dataa.length > dataT.length) {
        datos();
        datosCoordenadas();
      }
    } catch (err) {
      console.log(err);
    }
  }, 1000);
}, 1000);

//Ultimo dato obtenido de oxigeno

const oxigeno = document.getElementById('oxigeno');
const temp = document.getElementById('temp');
const turbidez = document.getElementById('turbidez');
const co2 = document.getElementById('co2');

const oxigenop = document.getElementById('oxigenop');
const tempp = document.getElementById('tempp');
const turbidezp = document.getElementById('turbidezp');
const co2p = document.getElementById('co2p');

if (oxigeno) {
  setInterval(() => {
    fetch('php/ultimos_datos.php')
      .then(r => r.json())
      .then(r => {
        // console.log(r.oxigeno)
        oxigeno.innerHTML = `<h4 class="mt-4">${r.oxigeno} O<sub>2</sub></h4>
                             <h6>${r.fecha}</h6>`;
        temp.innerHTML = `<h4 class="mt-4">${r.temperatura} °C</h4>
                             <h6>${r.fecha}</h6>`;
        turbidez.innerHTML = `<h4 class="mt-4">${r.turbidez} m</h4>
                             <h6>${r.fecha}</h6>`;
        co2.innerHTML = `<h4 class="mt-4">${r.dioxido_carbono} CO<sub>2</sub></h4>
                             <h6>${r.fecha}</h6>`;
                             
        oxigenop.innerHTML = `<h4 class="mt-4">${r.oxigeno} O<sub>2</sub></h4>
                             <h6>${r.fecha}</h6>`;
        tempp.innerHTML = `<h4 class="mt-4">${r.temperatura} °C</h4>
                             <h6>${r.fecha}</h6>`;
        turbidezp.innerHTML = `<h4 class="mt-4">${r.turbidez} m</h4>
                             <h6>${r.fecha}</h6>`;
        co2p.innerHTML = `<h4 class="mt-4">${r.dioxido_carbono} CO<sub>2</sub></h4>
                             <h6>${r.fecha}</h6>`;
      })
      .catch(err => console.error(err));
  }, 1000);
}

// Grafica para oxigeno

const graficaOxigeno = document.getElementById('graficaOxigeno');

if (graficaOxigeno) {

  const labels = [];
  const dataOxigen = [];
  const data = {
    labels: labels,
    datasets: [{
      label: 'Oxigeno',
      backgroundColor: 'rgb(255, 99, 132)',
      borderColor: 'rgb(255, 99, 132)',
      data: dataOxigen,
    }]
  };

  const config = {
    type: 'line',
    data,
    options: {}
  };

  var oxigenChart = new Chart(
    graficaOxigeno,
    config
  );

  function renderOxigeno() {
    let fecha = document.getElementById('fechaOxigen').value;
    let dataFecha = new FormData();

    dataFecha.append('fecha', fecha);

    fetch('php/datos_graficas.php', {
        method: 'POST',
        body: dataFecha
      })
      .then(r => r.json())
      .then(r => {
        // console.log(r)

        if (r.length > 0) {
          for (let i = labels.length; i > 0; i--) {
            labels.pop();
            for (let j = dataOxigen.length; j > 0; j--) {
              dataOxigen.pop();
            }
          }

          r.map(item => {
            dataOxigen.push(item.oxigeno);
            labels.push(item.fecha);
            oxigenChart.update();
          });

          // console.log(dataOxigen)
        } else {
          for (let i = labels.length; i > 0; i--) {
            labels.pop();
            for (let j = dataOxigen.length; j > 0; j--) {
              dataOxigen.pop();
            }
          }

          oxigenChart.update();

          // console.log('No hay datos')
        }
      })
      .catch(err => console.error(err));
  }

  renderOxigeno();

}

// Grafica para temperatura

const graficaTemp = document.getElementById('graficaTemp');

if (graficaTemp) {

  const labels = [];
  const dataTemp = [];
  const data = {
    labels: labels,
    datasets: [{
      label: 'Temperatura',
      backgroundColor: 'rgb(102, 123, 255)',
      borderColor: 'rgb(102, 123, 255)',
      data: dataTemp,
    }]
  };

  const config = {
    type: 'line',
    data,
    options: {}
  };

  var tempChart = new Chart(
    graficaTemp,
    config
  );

  function renderTemp() {
    let fecha = document.getElementById('fechaTemp').value;
    let dataFecha = new FormData();

    dataFecha.append('fecha', fecha);

    fetch('php/datos_graficas.php', {
        method: 'POST',
        body: dataFecha
      })
      .then(r => r.json())
      .then(r => {
        // console.log(r)

        if (r.length > 0) {
          for (let i = labels.length; i > 0; i--) {
            labels.pop();
            for (let j = dataTemp.length; j > 0; j--) {
              dataTemp.pop();
            }
          }

          r.map(item => {
            dataTemp.push(item.temperatura);
            labels.push(item.fecha);
            tempChart.update();
          });

          // console.log(dataOxigen)
        } else {
          for (let i = labels.length; i > 0; i--) {
            labels.pop();
            for (let j = dataTemp.length; j > 0; j--) {
              dataTemp.pop();
            }
          }

          tempChart.update();

          // console.log('No hay datos')
        }
      })
      .catch(err => console.error(err))
  }

  renderTemp();
}

// Grafica para turbidez

const graficaTurbidez = document.getElementById('graficaTurbidez');

if (graficaTurbidez) {

  const labels = [];
  const dataTurb = [];
  const data = {
    labels: labels,
    datasets: [{
      label: 'Turbidez',
      backgroundColor: 'rgb(102, 255, 167)',
      borderColor: 'rgb(102, 255, 167)',
      data: dataTurb,
    }]
  };

  const config = {
    type: 'line',
    data,
    options: {}
  };

  var turbChart = new Chart(
    graficaTurbidez,
    config
  );

  function renderTurb() {
    let fecha = document.getElementById('fechaTurb').value;
    let dataFecha = new FormData();

    dataFecha.append('fecha', fecha);

    fetch('php/datos_graficas.php', {
        method: 'POST',
        body: dataFecha
      })
      .then(r => r.json())
      .then(r => {
        // console.log(r)

        if (r.length > 0) {
          for (let i = labels.length; i > 0; i--) {
            labels.pop();
            for (let j = dataTurb.length; j > 0; j--) {
              dataTurb.pop();
            }
          }

          r.map(item => {
            dataTurb.push(item.turbidez);
            labels.push(item.fecha);
            turbChart.update();
          });

          // console.log(dataOxigen)
        } else {
          for (let i = labels.length; i > 0; i--) {
            labels.pop();
            for (let j = dataTurb.length; j > 0; j--) {
              dataTurb.pop();
            }
          }

          turbChart.update();

          // console.log('No hay datos')
        }
      })
      .catch(err => console.error(err))
  }

  renderTurb();
}

// Grafica para CO2

const graficaCO2 = document.getElementById('graficaCO2');

if (graficaCO2) {

  const labels = [];
  const dataCO2 = [];
  const data = {
    labels: labels,
    datasets: [{
      label: 'CO2',
      backgroundColor: 'rgb(255, 246, 102)',
      borderColor: 'rgb(255, 246, 102)',
      data: dataCO2,
    }]
  };

  const config = {
    type: 'line',
    data,
    options: {}
  };

  var co2Chart = new Chart(
    graficaCO2,
    config
  );

  function renderCO2() {
    let fecha = document.getElementById('fechaCO2').value;
    let dataFecha = new FormData();

    dataFecha.append('fecha', fecha);

    fetch('php/datos_graficas.php', {
        method: 'POST',
        body: dataFecha
      })
      .then(r => r.json())
      .then(r => {
        // console.log(r)

        if (r.length > 0) {
          for (let i = labels.length; i > 0; i--) {
            labels.pop();
            for (let j = dataCO2.length; j > 0; j--) {
              dataCO2.pop();
            }
          }

          r.map(item => {
            dataCO2.push(item.dioxido_carbono);
            labels.push(item.fecha);
            co2Chart.update();
          });

          // console.log(dataOxigen)
        } else {
          for (let i = labels.length; i > 0; i--) {
            labels.pop();
            for (let j = dataCO2.length; j > 0; j--) {
              dataCO2.pop();
            }
          }

          co2Chart.update();

          // console.log('No hay datos')
        }
      })
      .catch(err => console.error(err))
  }

  renderCO2();
}

// Actualizacion en tiempo real de las graficas

setInterval(async () => {
  try {
    let response = await fetch('php/total_datos.php');
    let data = await response.json();
    let longitud = data;

    // console.log(longitud)
    // console.log(data)

    setTimeout(async () => {
      let newResponse = await fetch('php/total_datos.php');
      let newData = await newResponse.json();

      if (newData > longitud) {
        renderCO2();
        renderOxigeno();
        renderTemp();
        renderTurb();
      }
    }, 1000);

  } catch (err) {
    console.error(err);
  }
}, 1000);