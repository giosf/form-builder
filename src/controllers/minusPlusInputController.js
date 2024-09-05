const buttonGroup = document.querySelectorAll('[id^=minus-plus-container]');

const buttonGroupPressed = e => { 
    let plusButton = buttonGroup[0].children["plus-button"];

    if (e.target.id === 'plus-button')
    {
        var input = e.target.parentElement.getElementsByTagName('input')[0];
        var range = input.getAttribute('range');
        var value = parseInt(input.value);

        if (value < range)
        {
            input.value = value + 1;
        }
        if (value == range || value == range - 1)
        {
            e.target.setAttribute("style", "background-color:#ffaaaa")
        }

        return false;
    }
    else
    {
        var input = e.target.parentElement.getElementsByTagName('input')[0];
        var value = parseInt(input.value);
        var count = value - 1;
        count = count < 1 ? 0 : count;
        input.value = count;
        let plusButton = e.target.parentNode.children["plus-button"];
        plusButton.setAttribute("style", "background-color:#f8f9fa")
    }
}

for (let button of buttonGroup)
{
    button.addEventListener("click", buttonGroupPressed);
}
