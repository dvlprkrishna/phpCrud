<?php
  require('inc/cons.php')
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>CRUD</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="style.css">
    <style type="text/css">
      #corner-box {
        position: fixed;
        background: #fff;
        bottom: 0;
        padding: 2rem 1rem;
        margin: 2rem 1rem;
        right: 0;
        width: 20rem;
        z-index: 2000000005;
        border: 2px solid #444;
      }
      #corner-box p {
        font-size: 1rem;
        line-height: 1.2rem;
      }
      #corner-box button {
        padding: .5rem 1rem;
      }
      #corner-box .corner-close {
        position: absolute; top: 3%; right: 2%; width: 29px; height: 29px; overflow: hidden; display: block;
        cursor: pointer;
      }
    </style>
  </head>
  <body>
  <!-- Listing -->
    <div class="container-xl">
      <div class="table-responsive">
        <div class="table-wrapper">
          <div class="table-title">
            <div class="row">
              <div class="col-sm-6">
                <h2>Simple Blog CRM</h2>
              </div>
              <div class="col-sm-6">
                <a href="#addEmployeeModal" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Add New Blog Post</span></a>
                <a href="#deleteAllModal" class="btn btn-danger" data-toggle="modal"><i class="material-icons">&#xE15C;</i> <span>Delete All Blog Post</span></a>						
              </div>
            </div>
          </div>
          <table class="table table-striped table-hover">
            <caption>List of Blog Post Data</caption>
            <thead>
              <tr> 
                <th>Author Name</th>
                <th>Blog Title</th>
                <th>Content</th>
                <th>Email</th>
                <th>Controls</th>
              </tr>
            </thead>
            <tbody id="dataWrapper">              
              
            </tbody>
          </table>
          
           
        </div>
      </div>        
    </div>
  <!-- Add Modal HTML -->
    <div id="addEmployeeModal" class="modal fade">
      <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content">
          <form name="addD">
            <div class="modal-header">						
              <h4 class="modal-title">Add Blog Post</h4>
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body" id="addEmpBody">					
              <div class="form-group">
                <label>Author Name</label>
                <input type="text" name="author" class="form-control" required>
              </div>
              <div class="form-group">
                <label>Title</label>
                <input type="text" name="title" class="form-control" required>
              </div>					
              <div class="form-group">
                <label>Content</label>
                <textarea class="form-control" name="content" required></textarea>
              </div>
              <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" class="form-control" required>
              </div>			
            </div>
            <div class="modal-footer">
              <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
              <input type="button" class="btn btn-success" value="Add" onclick="insertData()">
            </div>
          </form>
        </div>
      </div>
    </div>
  <!-- Edit Modal HTML -->
    <div id="editEmployeeModal" class="modal fade">
      <div class="modal-dialog modal-dialog-centered  modal-xl">
        <div class="modal-content">
          <form>
            <div class="modal-header">						
              <h4 class="modal-title">Update Blog Post</h4>
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body" id="updateEmpBody">					
              <form name="updateBD">
                <div class="form-group">
                  <label>Author Name</label>
                  <input type="text" name="ct-author" class="form-control" required>
                </div>
                <div class="form-group">
                  <label>Title</label>
                  <input type="text" name="ct-title" class="form-control" required>
                </div>					
                <div class="form-group">
                  <label>Content</label>
                  <textarea class="form-control" name="ct-content" required></textarea>
                </div>
                <div class="form-group">
                  <label>Email</label>
                  <input type="email" name="ct-email" class="form-control" required>
                </div>
              </form>			
            </div>
            <div class="modal-footer">
              <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
              <input type="submit" class="btn btn-success" value="Update" onclick="updateBlogData()">
            </div>
          </form>
        </div>
      </div>
    </div>
  <!-- Delete Modal HTML -->
    <div id="deleteEmployeeModal" class="modal fade">
      <div class="modal-dialog modal-dialog-centered  modal-xl">
        <div class="modal-content">
          <form>
            <div class="modal-header">						
              <h4 class="modal-title">Delete Blog Post</h4>
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body" id="deleteMBody">					
              <p>Are you sure you want to delete these Blog Post?</p>
              <p class="text-danger"><small>This action cannot be undone.</small></p>
            </div>
            <div class="modal-footer">
              <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
              <input type="submit" class="btn btn-danger" value="Delete" id="delinvblog">
            </div>
          </form>
        </div>
      </div>
    </div>
  <!-- Delete All Data -->
    <div id="deleteAllModal" class="modal fade">
      <div class="modal-dialog modal-dialog-centered  modal-xl">
        <div class="modal-content">
          <form>
            <div class="modal-header">            
              <h4 class="modal-title">Delete All Blog Data</h4>
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">          
              <p>Are you sure you want to delete these Blog Post?</p>
              <p class="text-danger"><small>This action cannot be undone.</small></p>
            </div>
            <div class="modal-footer">
              <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
              <input type="submit" class="btn btn-danger" value="DeleteAll">
            </div>
          </form>
        </div>
      </div>
    </div>
    
    <div id="corner-box" style="visibility: hidden;">
      <div class="corner-close" onclick="hideCornerBox()">
        <img src="https://siteintercept.qualtrics.com/WRSiteInterceptEngine/../WRQualtricsShared/Graphics/siteintercept/bwc_close.png">
      </div>
      <div>
        <p>Let your voice be heard.<br> Tell us about your experience on ebusinessconsultant.in</p>
      </div>
      <div class="text-center">
        <button class="btn btn-warning">Start Survey</button>
      </div>
    </div>
    
  <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script> 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.min.js"></script>
    <script>
    // console.log("debuuging");
      $(window).on('load', function(){
        var ct_url = location.href;
        // Activate tooltip
        $('[data-toggle="tooltip"]').tooltip();  
        fetchData();
      });
// fetch all details
      function fetchData(){
        var dataHTML = ''; 
        $.ajax({
          url: "api/read.php",
          type: 'GET',
          // dataType: 'json',
          success: function(data){
            var formattedData;
            formattedData = JSON.parse(data);  
            if(formattedData.success){
              for(i = 0; i < formattedData.data.length; i++){       
                dataHTML += `<tr> 
                  <td>${formattedData.data[i].author}</td>
                  <td>${formattedData.data[i].title}</td>
                  <td>${formattedData.data[i].content}</td>
                  <td>${formattedData.data[i].email}</td>
                  <td id="${formattedData.data[i].id}">

                    <a onclick="editInvData(${formattedData.data[i].id})" type="button"  class="edit" data-id="${formattedData.data[i].id}" data-author="${formattedData.data[i].author}" data-title="${formattedData.data[i].title}" data-email="${formattedData.data[i].email}" data-content="${formattedData.data[i].content}"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
                    <a onclick="delinvdatatrig(${formattedData.data[i].id})" type="button" class="deleteInv" data-id="${formattedData.data[i].id}" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
                  </td>
                </tr>\n`;
                // console.log(dataHTML);
              }
              $('caption').text('List of Blog Post - '+ formattedData.data.length);
            } else {
              dataHTML = `<p class="my-1">No Records available</p>`;
              $('caption').text('List of Blog Post - 0');
            }
            $('#dataWrapper').html(dataHTML); 
          },
          error: function(){
            alert('error');
          }
        });
      }  
// Add Entries
      function insertData(){
        var sendData = $('[name="addD"]').serialize();
        console.log(sendData);
        console.log('clicl');
        $.ajax({
          url: 'api/create.php?'+sendData,
          type: 'POST', 
          success: function(){
            $('#addEmpBody').html('');
            $('#addEmpBody').html('<p>Data Added Successfully</p>');
            $('[value="Add"]').css('display','none');
            $('[value="Cancel"]').css('display','none');
            location.href = location.href;
          },
          error: function(){
            alert('error');
          }
        });
      }
// Edit individual Data Trigger
      function editInvData(id){  
        console.log(id);
        ct_id = id;
        ct_content = $(`#${ct_id} a`).attr('data-content').trim();
        ct_title = $(`#${ct_id} a`).attr('data-title').trim();
        ct_author = $(`#${ct_id} a`).attr('data-author').trim();
        ct_email = $(`#${ct_id} a`).attr('data-email').trim();
          
        $('input[name="ct-email"]').val(ct_email);
        $('input[name="ct-author"]').val(ct_author);
        $('input[name="ct-title"]').val(ct_title);
        $('textarea[name="ct-content"]').val(ct_content);

        $("#editEmployeeModal").modal();
        
      }
      // Edit Individual Data
      function updateBlogData(){ 
          $.ajax({
            url: 'api/update.php',
            type: 'POST',
            data: {
              id : ct_id,
              author : $('input[name="ct-author"]').val(),
              title : $('input[name="ct-title"]').val(),
              content : $('textarea[name="ct-content"]').val(),
              email : $('input[name="ct-email"]').val()
            }, 
            success: function(data){
              console.log(data);
              $('#updateEmpBody').html('');
              $('#updateEmpBody').html('<p>Data Added Successfully</p>');
              $('[value="Update"]').css('display','none');
              $('[value="Cancel"]').css('display','none');
              $("#editEmployeeModal").modal('hide');
               
              location.href = location.href;
              location.href = location.href;
              
            },
            error: function(err){
              alert('error');
            }
          });
        }
      
// Delete individual Data
      function delinvdatatrig(id){
        delInvData(id);
      }
      function delInvData(id){ 
        $("#deleteEmployeeModal").modal();
        
        $('#delinvblog').on('click',function(){
          $.ajax({
            url: 'api/delete.php',
            type: 'GET',
            data: {id: id},
            success: function(data){
              $('#deleteMBody').html('');
                $('#deleteMBody').html('<p>Blog Post Deleted Successfully</p>');
                $('[value="Delete"]').css('display','none');
                $('[value="Cancel"]').css('display','none');
                $("#deleteEmployeeModal").modal('hide');
                
                location.href = location.href;
                location.href = location.href;
            },
            error: function(err){
              alert('error')
            }
          });
        })
      }
// Delete all data
      $('[value="DeleteAll"]').on('click', function(){
        delAllData();
      });
      function delAllData(){
        $.ajax({
          url: 'api/deleteAll.php',
          type: 'GET',
          success: function(data){
            alert('All data lost')
          },
          error: function(err){
            alert('error')
          }
        });
      }

    </script>


  <script type="text/javascript">
      // Hides popup
      function hideCornerBox(){
        $('#corner-box').css('transition','1s');
        $('#corner-box').css('visibility','hidden');
      }
      // Sets Cookies for one time only show
      $(function(){
        if($.cookie('popup_cookie') != '1'){
          // show popup here
              // time in minutes 
          setTimeout(function(){ showCornerBox() }, 2000);
          $.cookie('popup_cookie', '1', { expires: 30});
        }
      });
      // shows popup
      function showCornerBox(){
        $('#corner-box').removeAttr('style');
        $('#corner-box').css('visibility','visible');
      }
    </script>
  </body> 
</html>