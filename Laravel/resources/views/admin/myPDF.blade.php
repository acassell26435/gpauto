
<center><h3>Booking Report</h3></center>
<table style="border-collapse: separate;" class="table table-hover teams-table">
    <thead>
      <tr class="info">
        <th>Booking No.</th>
        <th>Customer Name</th>
        <th>Washing plan</th>
        <th>Appointment Date</th>
        <th>Time Frame</th>
        <th>Status</th>
        <th>Transaction Date</th>
        
      </tr>
    </thead>

    <tbody>
          @if ($appointments)
          @php
          $i = 1;
        
          @endphp

          @foreach ($appointments as $appointment)
    
          <tr>
           
            <td>  {{$i++}}</td>
            <td>{{ucfirst($appointment->user->name)}}</td>
            
            <td>{{$appointment->washing_plan->name}}</td>
            <td>
                @if(isset($appointment->appointment_date))
                {{date('m/d/Y',strtotime($appointment->appointment_date))}}
                @else
                -
                @endif
            </td>
            <td>
                @if(isset($appointment->time_frame))
                {{$appointment->time_frame}}
                @else
                -
                @endif
            </td>
            <td>
                @if(isset($appointment->status_id))
                {{$appointment->status->status}}
                @else
                -
                @endif
            </td>
             <td>
                @if(isset($appointment->created_at))
                {{date('m/d/Y',strtotime($appointment->created_at))}}
                @else
                -
                @endif
            </td>
            
          </tr>
     
      @endforeach
      @endif
    </tbody>
</table>