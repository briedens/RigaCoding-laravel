@extends('layouts.todo_layout')



@section ('navigation')
   <nav class="navbar_top">
      <!--NavBar Start--->
      <ul class="nav_left_list">
         <li class="nav_item">
            <a href="/#home">Home</a>
         </li>
         <li class="nav_item"> 
            <a href="/#features">Features</a>
         </li>
         <li class="nav_item">
            <a href="#">About</a>
         </li>
         <li class="nav_item">
            <a href="#">Work</a>
         </li>
      </ul>
      <div class="logo">
      <a href="/">
         <img src="https://image.spreadshirtmedia.com/image-server/v1/mp/designs/1009137217,width=178,height=178/majestic-deer-logo.png" class="logo_img">
      </a>
      </div>
      <ul class="nav_right_list">
         <li class="nav_item"> 
            <a href="/todo">To-Do List</a>
         </li>
         <li class="nav_item">
            <a href="#">Project2</a>
         </li>
         <li class="nav_item">
            <a href="#">Project3</a>
         </li>
         <li class="nav_item">
            <a href="#">Project4</a>
         </li>
      </ul>
   </nav>
@endsection 
