const ctx = document.getElementById("myChart");

new Chart(ctx, {
  type: "doughnut",
  data: {
    labels: ["PDP", "DPP", "ACN", "PPA", "CDC", "JP"],
    datasets: [
      {
        label: "PU results",
        data: [802, 719, 416, 939, 394, 99],
        backgroundColor: [
          "#0d1321",
          "#1d4e89",
          "#00b2ca",
          "#7dcfb6",
          "#fbd1a2",
          "#f79256",
        ],
        hoverOffset: 4,
        borderWidth: 1,
      },
    ],
  },
  options: {
    plugins: {
      legend: {
        display: false,
      },
    },
  },
});
