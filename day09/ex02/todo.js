var tab = [];
var index = 0;
var index2 = 0;
var flag = 0;

function add_new(elem)
{
  var todo;
  if (flag == 0)
  {
    todo = prompt("Entrez une nouvelle tâche : ");
  }
  else {
    todo = elem;
  }
  if (todo)
  {
    var list = document.getElementById("ft_list");
    var newitem = document.createElement("DIV");
    newitem.setAttribute("class", "newelem");
    newitem.setAttribute("onclick", "suppr(this)");
    newitem.setAttribute("index", index);
    var textnode = document.createTextNode(todo);
    tab[index] = todo;
    index++;
    newitem.appendChild(textnode);
    list.insertBefore(newitem, list.childNodes[0]);
    if (flag == 0)
    {
      update_cookies();
    }
  }
}
function suppr(obj)
{
  if (confirm("Souhaitez-vous réellement supprimer cette tâche ?") == true)
  {
    var ind = obj.getAttribute("index");
    tab.splice(ind, 1);
    obj.parentNode.removeChild(obj);
    update_cookies();
  }
}

function update_cookies()
{
  var json_str = JSON.stringify(tab);
  document.cookie = "todos="+json_str;
}

window.onload = function()
{
  if (document.cookie)
  {
    flag = 1;
    var cook = document.cookie;
    var newtab = cook.split("=");
    var test = JSON.parse(newtab[1]);
    for (elem in test)
    {
      add_new(test[elem]);
    }
    flag = 0;
  }
}
