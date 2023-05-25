<div>
    <x-slot name="title">
        Dashboard
    </x-slot>

    <style>
 .page-title {
            text-decoration: underline;
            font-size: 2.5rem;
            font-weight: bold;
            margin-top: 2rem;
            text-align: left;
            margin-left: 2rem
        }
        .report-container {
            display: flex;
            justify-content: space-around;
            align-items: center;
            flex-wrap: wrap;
            margin-top: 2rem;
        }
    
        .report-card {
            background-color: #fff;
            box-shadow: 0px 2px 4px rgba(5, 0, 0, 0.1);
            border-radius: 5px;
            padding: 1.5rem;
            margin: 1rem;
            text-align: center;
            flex-basis: 300px;
            
            
        }
    
       .report-count {
            font-size: 2rem;
            font-weight: bold;
            margin-top: 1rem;
        }
    
        .report-title {
            font-size: 1.5rem;
            margin-top: 1rem;
        }
        
    </style>
    
    <h1 class="page-title">Dashboard</h1>
    
    <div class="report-container">
        <div class="report-card">
            <div class="report-count">{{ $dailyCount }}</div>
            <div class="report-title">Daily Report Count</div>
        </div>
        <div class="report-card">
            <div class="report-count">{{ $monthlyCount }}</div>
            <div class="report-title">Monthly Report Count</div>
        </div>
        <div class="report-card">
            <div class="report-count">{{ $yearlyCount }}</div>
            <div class="report-title">Yearly Report Count</div>
        </div>
    </div>
    




