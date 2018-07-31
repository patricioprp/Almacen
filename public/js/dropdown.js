
$("#state").change(function(event){
    $.get("/provinces/"+event.target.value+"",function(response, state){
      $("#province").empty();
      for(i=0;i<response.length;i++){
      $("#province").append("<option value='"+response[i].id+"'> "+response[i].name+"</option>");
      }
    });
    });
    $("#province").change(function(event){
      $.get("/locations/"+event.target.value+"",function(response, province){
        $("#location").empty();
        for(i=0;i<response.length;i++){
        $("#location").append("<option value='"+response[i].id+"'> "+response[i].name+"</option>");
        }
      });
      });

      $("#stateb").change(function(event){
        $.get("/admin/user_id/user/provinces/"+event.target.value+"",function(response, state){
          $("#provinceb").empty();
          for(i=0;i<response.length;i++){
          $("#provinceb").append("<option value='"+response[i].id+"'> "+response[i].name+"</option>");
          }
        });
        });
        $("#provinceb").change(function(event){
          $.get("/admin/user_id/user/locations/"+event.target.value+"",function(response, province){
            $("#locationb").empty();
            for(i=0;i<response.length;i++){
            $("#locationb").append("<option value='"+response[i].id+"'> "+response[i].name+"</option>");
            }
          });
          });
      