
    <div class="flex flex-col gap-2 ">
      <div class="flex justify-between">
        <lable>
            Form:
          <input wire:model="search" onchange="onChange()"  id="date-picker" type="date"    class="border rounded-md" />
        </lable>
        <lable>
            To:
          <input wire:model="searchto" onchange="onChange()"  id="date-pickerto" type="date"    class="border rounded-md" />
        </lable>
        </div>

      <div class="overflow-x-auto overflow-y-auto h-[500px]">
          <table class="table-auto w-full">
            <thead class="sticky top-0 bg-gray-100">
              <tr class="text-left">
                <th class="px-4 py-2">Dispositions <a href="{{route('reports.index')}}">test</a></th>
                <th class="px-4 py-2">Count</th>
              </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
              @foreach ($dispositonCount as $key=>$value)
              <tr class="text-left">
                  <td class="px-6 py-4 whitespace-nowrap">
                    <div class="text-sm text-gray-900 font-medium">{{$key}}</div>
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap">
                    <div class="text-sm text-gray-900">{{$value}}</div>
                  </td>
              </tr>
              @endforeach
            </tbody>
          </table>
      </div>
    </div>
    <div class="mt-12 w-3/4 bg-gray-50">
      <canvas id="myChart"></canvas>
    </div>

  {{-- <livewire:reports.bar-graph :user_id="$id"/> --}}


<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>

  var ctx = document.getElementById('myChart');
  var res;
  var phpObject = @php echo json_encode($dispositonCount); @endphp;
  var keys = [];
  var values = [];

  for (const key in phpObject) {
    keys.push(key);
    values.push(phpObject[key]);
  }

  var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
      labels: keys,
      datasets: [
        {
        label: 'Dispositions',
        backgroundColor: ["violet", "indigo", "blue", "green", "yellow", "orange","red","pink","black", "gray","brown","lime","wheat","navy","orchid", "teal","purple","magenta", "gold"],
        data: values,
        borderWidth: 1
      }
    ]
    },
    options: {
      scales: {
        y: {
          beginAtZero: true
        }
      }
    }
  });
  function onChange() {
    var dt = document.getElementById('date-picker').value;
    var dtto = document.getElementById('date-pickerto').value;
    var url = "{{route('reports.api-data1')}}";
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

    $.ajax({
        url: url,
        type: 'POST',
        data: {_token: CSRF_TOKEN, id: {{$id}}, date: dt, dateto: dtto},
        dataType: 'JSON',
        success: function (data) {

            if (window.myChart) {
                window.myChart.destroy();
            }


            var canvas = document.getElementById('myChart');
            var ctx = canvas.getContext('2d');
            ctx.clearRect(0, 0, canvas.width, canvas.height);


            var keys = Object.keys(data);
            var values = Object.values(data);
            window.myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: keys,
                    datasets: [{
                        label: 'Dispositions',
                        backgroundColor: ["violet", "indigo", "blue", "green", "yellow", "orange","red","pink","black", "gray","brown","lime","wheat","navy","orchid", "teal","purple","magenta", "gold"],
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
        }
    });
  }

</script>



