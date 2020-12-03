// start event handling
  document.addEventListener( 'DOMContentLoaded' , (event) => {
   
    const modal = document.querySelector( '#myModal' );
    const modal_content = document.querySelector( '#content-modal' );
    const modal_buttons_container = document.querySelector( '#content-modaltwo' );
    const modal_buttons = document.querySelector( '#modal-buttons' );
    const dynamic_table = document.getElementById( 'container_table' );
    const t_body = document.querySelector('#t_body');
    var contents = [];
    // all widget "view" buttons
    const viewButtons = document.querySelectorAll( '.companiesButton' );
    const workflow_container = document.getElementById('workflow-container');
    const workflow_buttons = document.querySelector('#workflow-buttons');
    var list_items = document.getElementById('workflow-list').getElementsByTagName('li');
    var i;
    var counter;
    // table entry view buttons event listener
    // can add table events here
    dynamic_table.addEventListener( 'click', event =>{
      // class names of the target element
        var classNames = event.target.className.split(' ');
        if(event.target && classNames.includes('applicantcb')){
          
          dynamic_table.style.display = 'none';
          modal_buttons.style.display = 'none';
          workflow_buttons.style.display = 'block';
          const row = event.target.closest('tr');
          //console.log(row);
          counter = 0;
          //returns data from the row of corresponding button
          [].forEach.call(row.childNodes, child =>{
            if(counter > 0){
              contents.push( child.textContent );
            }
            ++counter;
          });
          workflow_container.style.display = 'block';

          var numItems = list_items.length;
          for( i = 0; i < 2; ++i ){
            // we dont need the last node... the notes
            if(list_items[i].id !== 'notes'){
              list_items[i].childNodes[1].textContent = contents[i];
            }
          }
          if(classNames.includes('active')){
            workflow_buttons.style.display = 'none';
            document.getElementById('wrkfl-active-buttons').style.display='block';
          }
          
          }
    });


    //submit button for active applicant workflow
    var submit_active = document.getElementById('wrkfl-submit-active');
    submit_active.addEventListener( 'click', event=>{
      var usr = document.getElementById('submitter').childNodes[1].textContent;
         if( confirm('Are you sure you want to submit?') === true ){
            jQuery.ajax({
            type: "POST",
            url: "/workflow",
            data: {username : usr,
                flag:4
            },
            success: function( data ){
              console.log(data);
              alert("Applicant has been placed.");
            }
             
           });
         }
         else{
          return;
         }
    });


    var client_upload_submit = document.getElementById('clients-submit');
    // csv file upload
    var client_file = document.getElementById('file');
    console.log(client_file.files[0]);
    client_upload_submit.addEventListener( 'click', event=>{
        if( client_file.files.length === 0 ){
          alert("Please Select a File.");
          return;
        }
        else if( client_file.files.length === 1 ){
          if( modal.classList.contains('hideElement') ){
          modal.classList.remove('hideElement');
        }
        if( modal.classList.contains('fadeOut') ){
           modal.classList.remove('fadeOut');
        }
          modal.classList.add('fadeIn');
          var formData = new FormData();
          formData.append('file', client_file.files[0]);
          jQuery.ajax({
            url: '/parse_csv',
            data: formData,
            type: 'POST',
            contentType: false, 
            processData: false,
            success: function(data){
              console.log(data)
            }
            // ... Other options like success and etc
        });
          document.getElementById('upload-container').style.display='flex';


        }
        else{
          alert('Error');
          return;
        }
    });

    //approve applicant buttonn and deny buttons
    workflow_buttons.addEventListener( 'click' , (event)=>{
      // approve applicant button
      if( event.target.id === 'approvebutton' && event.target.nodeName === 'BUTTON' ){
        var usrnme = document.getElementById('submitter').childNodes[1].textContent;
        console.log(usrnme);
         if( confirm('Are you sure you want to approve this applicant?') === true ){
           jQuery.ajax({
            type: "POST",
            url: "/workflow",
            data: {username : usrnme,
                flag:2
            },
            success: function( data ){
              console.log(data);
              alert("Applicant approved.");
            }
             
           });

          }
         else{
           return;
         }
       }
     });
        
        

        //save the notes and stuff
        //send the ajax request
      
      

  
    
    // bind click listener to each view button.
    viewButtons.forEach( item => { 
      item.addEventListener( 'click' , event => {
        if( modal.classList.contains('hideElement') ){
          modal.classList.remove('hideElement');
        }
        if( modal.classList.contains('fadeOut') ){
           modal.classList.remove('fadeOut');
        }
        modal.classList.add('fadeIn');
        
        modal_buttons.style.display = 'block';
        modal_content.style.display = 'block';
        modal_buttons_container.style.display = 'block';
        dynamic_table.style.display = 'block';
        getSource( item );
      });
    });
    
    
    //close Button
    const closeButton = document.querySelector( '#close' );
    

    const edit_button = document.querySelector( '#editButton' );
    
    [edit_button, closeButton].forEach( item =>{
      item.addEventListener( 'click', event =>{ 
        switch( item.id ){
          case 'close':
           workflow_container.style.display = 'none';
           dynamic_table.style.display = 'none';
           t_body.innerHTML = '';
           modal.classList.remove('fadeIn');
           modal.classList.add('fadeOut');

           modal.classList.add('hideElement');
           modal_buttons_container.style.display = 'none';

           for( i = 0; i <  list_items.length; ++i ){
             while( list_items[i].childNodes > 1 ){
              list_items[i].removeChild( list_items[i].lastChild );
             }
           }
           contents = [];
            break;

          case 'editButton':
           switch( num_selected ){
              case 1: 
                alert( 'success' ); 
                break;

              case 0:
                alert( 'Please select an applicant.' );
                break;

              default:
                alert( 'Please edit one applicant at a time.' );
                selectedCboxes.forEach( checkbox => {
                checkbox.removeAttribute( 'checked' );
                }); // loop
                break;
            } // switch
            break;

            default:
              alert( 'Error' );

        } // outer_switch
         
      }); // item listener

    });// array otf

  });


		
//end event handling

//start procedures
    
		// will return array with all info need for params of sec function
		function getSource( element ){
      console.log( element.id );

      var table_info = {
        newappsButton: ['applied', 'New Applicants', 'Date Applied'],
        inactiveButton: ['inactive', 'Inactive Applicants', 'Date Inactive'],
        placedButton: ['placed', 'Placed Associates', 'Date Placed'],
        activeButton: ['active', 'Active Associates', 'Date Active'],
        terminatedButton: ['terminated', 'Terminated Associates', 'Date Terminated'],
        dnrButton: ['dnr', 'DNR Associates', 'Date Added']
      };

			var correctInfo = table_info[element.id];
      var header = document.querySelector('#main-header');
      
      var date = document.querySelector('#date-header');

      header.textContent = correctInfo[1];
      date.textContent = correctInfo[2]

      jQuery.ajax({
        type: "POST",
        url: "/dashboard_ajax",
        data: { t_info : correctInfo },
        success: function( data ){
          t_body.insertAdjacentHTML( "afterbegin", data );
        }
         
      });
      
		}