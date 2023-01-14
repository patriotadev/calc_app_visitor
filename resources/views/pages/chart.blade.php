@extends('layouts.base')

@section('content')
    <div class="container mt-5">
        <div class="card">
            <div class="card-header">
                <h6>Visitor Chart</h6>
            </div>
            <div class="card-body">
                <div>
                    <canvas id="myChart"></canvas>
                </div>
            </div>
            <div class="card-footer">
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        const ctx = document.getElementById('myChart');
        const visitor = {!! json_encode($visitor) !!};
        let labels = [];
        let data = [];
        for (let i = 0; i < visitor.length; i++) {
            labels.push(visitor[i].name);
            const timeIn = new Date(visitor[i].timestamp_in);
            const timeOut = new Date(visitor[i].timestamp_out);
            const diffMs = (timeOut - timeIn);
            const diffDays = Math.floor(diffMs / 86400000); // days
            const diffHrs = Math.floor((diffMs % 86400000) / 3600000); // hours
            const diffMins = ((diffMs % 86400000) % 3600000) / 60000; // minutes
            const diffSec = diffMs / 1000;
            data.push(diffMins.toFixed(2))
        }
        new Chart(ctx, {
        type: 'bar',
        data: {
            labels,
            datasets: [{
            label: '(Minutes)',
            data,
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
@endsection