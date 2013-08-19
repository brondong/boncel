$(function()
{ 
  loadTabel();

  $(".inputan").keypress(function(event)
  {
    if (event.which == 13) submitURL();
  });
})

function loadTabel()
{
  $(".tabel").load(tabel, function()
  {
    paginasi();
  });
}

function submitURL()
{
  var url = $("#url").val().trim();
  var alias = $("#alias").val().trim();

  $.post(submit, { url:url, alias:alias }, function(respon)
  {
    // tidak valid
    if (respon.status == "error") {
      // url tidak valid
      if (respon.url) {
        $("#control-url").removeClass("success").addClass("error");
        $("#error-url").text(respon.url);
        $("#url").focus();
      } else {
        $("#control-url").removeClass("error").addClass("success");
        $("#error-url").text("");
      };

      // alias tidak valid
      if (respon.alias) {
        $("#control-alias").removeClass("success").addClass("error");
        $("#error-alias").text(respon.alias);

        // url tidak valid
        if (respon.url) {
          // focus ke input url
          $("#url").focus();
        } else {
          // focus ke input alias
          $("#alias").focus();
        };
      } else {
        $("#control-alias").removeClass("error").addClass("success");
        $("#error-alias").text("");
      };
    // valid
    } else {
      $("#error-url").text("");
      $("#error-alias").text("");
      $("#url").val("").focus();
      $("#alias").val("");
      $("#hasil").val(respon.hasil);
      $("#control-url").removeClass("success").removeClass("error");
      $("#control-alias").removeClass("success").removeClass("error");

      $("#hasil").zclip({
        path: home + "swf/zclip.swf",
        copy: $("#hasil").val(),
        afterCopy: function()
        {
          $("#control-hasil").addClass("success");
          $("#hasil").focus();
        }
      });

      loadTabel();
    };
  });
}

function paginasi()
{
    $(".pagination a").click(function()
    {
      var target = $(this).data("target");
      loadPaginasi(target);
    });
}

function loadPaginasi(target)
{
  $(".tabel").load(target, function()
  {
    paginasi();
  });
}