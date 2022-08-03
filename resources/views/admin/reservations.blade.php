<x-app-layout>
   
</x-app-layout>

<!DOCTYPE html>
<html lang="en">
  <head>
    @include("admin.admincss")
  </head>
  <body>

  <div class="container-scroller">
  @include("admin.navbar")
    <!-- container-scroller -->

    <div style="position:relative; right:-150px; top:60px">
        <table style="background-color:black; border:1px;">
            <tr>
                <th style="padding:25px;">Name</th>
                <th style="padding:25px;">Email</th>
                <th style="padding:25px;">Phone</th>
                <th style="padding:25px;">Guest</th>
                <th style="padding:25px;">Date</th>
                <th style="padding:25px;">Time</th>
                <th style="padding:25px;">Message</th>
                <th style="padding:25px;">Action</th>
            </tr>
            @foreach($data as $data)
            <tr align="center">
                <td>{{$data->name}}</td>
                <td>{{$data->email}}</td>
                <td>{{$data->phone}}</td>
                <td>{{$data->guest}}</td>
                <td>{{$data->date}}</td>
                <td>{{$data->time}}</td>
                <td>{{$data->message}}</td>
                <td><a href="">Complete</a></td>
            </tr>
            @endforeach
        </table>
    </div>

    <!-- page-body-wrapper ends -->

</div>
@include("admin.adminscript")
   
  </body>
</html>