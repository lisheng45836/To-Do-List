<?php
  include"db/auth.php";
?>
<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js" integrity="sha384-I6F5OKECLVtK/BL+8iSLDEHowSAfUo76ZL9+kGAgTRdiByINKJaqTPH/QVNS1VDb" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
        <link rel="stylesheet" type="text/css" href="css/style.css">
    </head>
    <body>
      <div class="main-content">
      <div class="pop container-fluid ">
      </div>
        <div class="all-lists page">
          <nav class="navbar navbar-inverse navbar-static-top">
            <div class="container-fluid">
              <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                  <span class="sr-only">Toggle navigation</span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">
                  <img alt="User" height="20" src="p.png">
                </a>
                <a class="navbar-brand" href="#"><? echo $row['name']?></a>
              </div>

              <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                  <li>
                    <? if($user){ ?>
                    <a class="navbar-brand" href="db/logout.php?logout">Log Out</a>
                    <? }else{ ?>
                      <a class="navbar-brand" href="login.php">login</a>
                    <? } ?>
                  </li>
                </ul>
              </div>
            </div>
          </nav>
    
          <div class="container-fluid">
           <!--  <h2 class="alert"></h2> -->
            <input type="hidden" id="uid" value="<?echo $uid?>">
            <div class="form-inline addList">
            <input type="text"  name="list" id="lists" class="form-control " placeholder="Add list">
            <button id="add" type="button" class="btn btn-success glyphicon glyphicon-plus" aria-hidden="true"></button>
            </div>

            <ul id="content" class="list-group list-group-sp"></ul>

            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    Edit
                  </div>
                  <form  method="POST" action="/web/todo/db/updateList.php">
                    <div class="modal-body1">

                    </div>
                    <div class="modal-footer">
                      <button type="submit" id="saveEdit" class="btn btn-primary">Save</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>

            </div>

        </div>

        <!--                      NOTE PAGE                         -->

        <div class="notes page">
        <nav class="navbar navbar-inverse navbar-static-top">
          <div class="container-fluid">
            <div class="navbar-header">
              <a href="/web/todo/#" class="navbar-brand" id="back"><span class="glyphicon glyphicon-chevron-left"></span></a>
                <a id="noteId" class="navbar-brand"><span class="label label-info" ></span></a>
            </div>
          </div>
        </nav>


      <div class="container-fluid">
        <div class="form-inline addList">

        <input type="text"  name="list" id="toDo" class="form-control" placeholder="Add ToDo">
        <button id="addToDo" type="button" class="btn btn-success glyphicon glyphicon-plus" aria-hidden="true"></button>
        <input type="hidden" name="status" id="status" value="unchecked">
        </div>

          <ul id="toDoList" class="list-group list-group-sp"></ul>

          <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <span class="title"></span>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

                  </div>
                  <div class="modal-body">
                    
                  </div>
                  <div class="modal-footer">
                    <button type="submit" id="show" class="btn btn-primary">Save</button>
                  </div>
                </div>
              </div>
          </div>
          
        <div id="showButton" >
        <button id="showCompleted" type="button" class="btn btn-danger center-block">Show Completed To-Dos</button><br>
        <button id="hideCompleted" type="button" class="btn btn-danger center-block" style="display:none">Hide Completed To-Dos</button><br>
        </div>
        <fieldset id="CompletedToDoList"></fieldset>
        </div>
        </div>

        <div class="error">
          
        </div>

      </div>
    </body>
      <!-- Function -->
      <script type="text/javascript" src="js/function.js"></script>
      <script type="text/javascript" src="js/alert.js"></script>
     
      <link rel="stylesheet" type="text/css" href="js/datetimepicker/jquery.datetimepicker.css"/ >
      <script src="js/datetimepicker/jquery.js"></script>
      <script src="js/datetimepicker/build/jquery.datetimepicker.full.min.js"></script>

</html>
