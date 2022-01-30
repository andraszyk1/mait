$('.search').on('keyup',function(){
    const form=$('form.computer_filter').serialize();
    console.log(decodeURI(form));
    $.ajax({ 
      method:"GET",   
      data:form,
      url:`/computer/szukaj`,
      headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
      }).
      done(function(response){
        console.log(response);
         $('tbody').empty();
         $.each(response.data,function(index,data){
          var del = "/computer/delete/"+data.id; 
          var edit = "/computer/edit/"+data.id;
          const html=`<tr><td>${data.id}</td><td>${data.model}</td><td>${data.sn}</td><td>${data.ram}</td><td>${data.processor}</td><td>${data.hdd}</td><td>${data.OS}</td><td>${data.status}</td><td><a class="btn btn-outline-dark btn-sm" href="${del}">Delete</a><a class="btn btn-outline-dark btn-sm" href="${edit}">Edit</a></td></tr>`;  
        $('tbody').append(html);
        })
      }).
      fail(function(xhr, status, error) {
      console.log(xhr.responseText);
      })
    });
    