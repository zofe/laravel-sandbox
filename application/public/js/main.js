
//rating 

function post_rate(entity, id, sc, csrf)
{
    $('#rate').raty({ 
       score: sc,
       click: function(score, evt) {
            $.post("/ajax/rate/"+entity+"/"+id, {rate: score, _token: csrf}, function(data)
            {
                if (data.valid<1)
                {
                    $("#rate_response").text(" ammesso un solo voto");
                } else {
                    $("#rate_response").text(" voto " + data.rating + " su " + data.rating_count + " voti");                                        
                }
            }, "json");
        }
    });  
}

