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
    <div>
        <form action="{{url('/uploadChef')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div style="padding:20px;">
            <label for="name">Name</label>
            <input type="text" style="color:black" name="name" placeholder="Chef's name" required />
            </div>
            <div style="padding:20px;">
                <label for="Specialty">Specialty</label>
                <input type="text" style="color:black" name="specialty" placeholder="Chef's specialization" required />
            </div>
            <div style="padding:20px;">
                <label for="image">Image</label>
                <input type="file" name="image" />
            </div>
            <div styl="padding:20px;">
                <button type="submit" name="submit" style="background:black;padding:15px;color:white;">Submit</button>
            </div>
        </form>

    	<div style="padding-top:20px;">
        <table style="background-color:black; border:2px;">
            <tr>
                <td style="padding:25px;">Name</td>
                <td style="padding:25px;">Specialty</td>
                <th style="padding:25px;">Image</th>
                <th style="padding:25px;">Action</th>
            </tr>
            @foreach($data as $data)
            <tr align="center">
                <td>{{$data->name}}</td>
                <td>{{$data->specialty}}</td>
                <td><img width=100 height=100 src="/chefimages/{{$data->image}}"/></td>
                <td><a href="{{url('deletechef', $data->id)}}">Delete</td>
            </tr>
            @endforeach
        </table>
        </div>
    </div>

       <!-- page-body-wrapper ends -->
   </div>
   @include("admin.adminscript")
      
     </body>
   </html>