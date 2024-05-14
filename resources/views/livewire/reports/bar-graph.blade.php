<div class="mt-12 w-1/2">
  <input type="date" class="border rounded-md" wire:model="dt" />
  <canvas id="myChart"></canvas>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
const ctx = document.getElementById('myChart');

var phpObject = <?php echo json_encode($dispositonCount); ?>;
var keys = [];
var values = [];

for (const key in phpObject) {
keys.push(key);
values.push(phpObject[key]);
}

new Chart(ctx, {
type: 'bar',
data: {
  labels: keys,
  datasets: [{
    label: 'Dispositions',
    data: values,
    borderWidth: 1
  }]
},
options: {
  scales: {
    y: {
      beginAtZero: true
    }
  }
}
});
</script>
