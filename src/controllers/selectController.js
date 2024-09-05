var select = document.querySelector('select.conditional');
if (select)
{
  var disableIf = select.getAttribute('disableIf');
  var fields = JSON.parse(JSON.parse(disableIf));
  var myInput = document.getElementById('myInput');
  select.onchange = function() {
    for (var [target, conditions] of Object.entries(fields))
    {
      var target = document.querySelector(target);
      if(conditions.find((element) => element == select.value))
      {
        target.disabled = true;
      }
      else
      {
        target.disabled = false;
      }
    }
  }
}
