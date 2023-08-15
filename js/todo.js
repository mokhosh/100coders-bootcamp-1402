const undone = JSON.parse(localStorage.undone) ?? []
const done = JSON.parse(localStorage.done) ?? []

const button = document.querySelector('#button')
const input = document.querySelector('#input')
const template = document.querySelector("template")

function add() {
    undone.unshift(input.value)
    input.value = ''

    render()
}

button.addEventListener('click', add)
input.addEventListener('keydown', function(event) {
    if (event.keyCode === 13 || event.key === 'Enter') {
        add()
    }
})

function render() {
    fillTodoList('undone', undone, done)
    fillTodoList('done', done, undone)

    localStorage.done = JSON.stringify(done)
    localStorage.undone = JSON.stringify(undone)
}

function fillTodoList(id, list, other) {
    const ul = document.getElementById(id)
    ul.replaceChildren()

    for (let i = 0; i < list.length; i++) {
        const li = createTodoElement(i, list, other)

        ul.appendChild(li)
    }
}

function createTodoElement(index, list, other) {
    const li = template.content.cloneNode(true)
        
    const checkbox = li.querySelector('input')
    checkbox.addEventListener('change', function () {
        const removed = list.splice(index, 1)
        other.unshift(removed)

        render()
    })
    
    const span = li.querySelector('span')
    const todo = document.createTextNode(list[index])
    span.appendChild(todo)

    return li
}

render()
