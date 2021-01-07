<!DOCTYPE html>
<html>
  <head>
    <script src="Javascriptsweb/chart.js/dist/Chart.js"></script>
    <script src="Javascriptsweb/chartjs-chart-geo/build/index.umd.js"></script>
  </head>

  <body>
    <div style="width: 75%;">
      <canvas id="canvas" style="border: 1px solid black;"></canvas>
    </div>
    <script>
      const country = fetch(
        'https://raw.githubusercontent.com/deldersveld/topojson/master/continents/europe.json'
      ).then((r) => r.json());
      const states = fetch(
        'https://raw.githubusercontent.com/deldersveld/topojson/master/countries/germany/dach-states.json'
      ).then((r) => r.json());

      Promise.all([states, country]).then((data) => {
        const regions = ChartGeo.topojson
          .feature(data[0], data[0].objects.layer)
          .features.filter((item) => item.properties.NAME_0 === 'Germany');
        const countries = ChartGeo.topojson.feature(data[1], data[1].objects.continent_Europe_subunits).features;
        const Germany = countries.find((d) => d.properties.geounit === 'Germany');

        const chart = new Chart(document.getElementById('canvas').getContext('2d'), {
          type: 'choropleth',
          data: {
            labels: regions.map((d) => d.properties.NAME_0),
            datasets: [
              {
                label: 'Countries',
                outline: Germany,
                data: regions.map((d) => ({
                  feature: d,
                  value: Math.random(),
                })),
              },
            ],
          },
          options: {
            showOutline: false,
            showGraticule: false,
            legend: {
              display: false,
            },
            scale: {
              projection: 'equalEarth',
            },
            geo: {
              colorScale: {
                display: true,
              },
            },
          },
        });
      });
    </script>
  </body>
</html>