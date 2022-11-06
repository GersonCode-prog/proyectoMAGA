

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                   <H1>Estadisticas</H1>
                   <div id="container"></div>
                </div>
            </div>
        </div>
    </div>
@push('scripts')
<script src="https://code.highcharts.com/highcharts.js"></script>
<script type="text/javascript" >
array=[]
cantidad=[]
    var asistencias = <?php echo json_encode($asistencias)?>;
    var data = <?php echo json_encode($data)?>;
    asistencias.forEach( e =>{                
                cantidad.push(e.persona)
            })
    console.log(cantidad)
   
    data.forEach( e =>{                
                array.push(e.nombre)
            })
    console.log(array)  
    
    Highcharts.chart('container', {
        title: {
            text: 'Capacitaciones Realizadas'
        },
        subtitle: {
            text: 'CADERES GUAZACAPAN'
        },
        xAxis: {
            categories: array
            
        },
        yAxis: {
            title: {
                text: 'CANTIDAD DE PERSONAS'
            }
        },
        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'middle'
        },
        plotOptions: {
            series: {
                allowPointSelect: true
            }
        },
        series: [{
            name: 'Capacitacion',
            data: cantidad
        }],
        responsive: {
            rules: [{
                condition: {
                    maxWidth: 500
                },
                chartOptions: {
                    legend: {
                        layout: 'horizontal',
                        align: 'center',
                        verticalAlign: 'bottom'
                    }
                }
            }]
        }
    });

</script>
@endpush('scripts')
</x-app-layout>


