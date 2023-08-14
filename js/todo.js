const undone = JSON.parse(localStorage.getItem('undone')) ?? []
const done = JSON.parse(localStorage.getItem('done')) ?? []

const button = document.querySelector('#button')
const input = document.querySelector('#input')

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
    const wrapper = document.querySelector('#wrapper')
    const undoneUl = createTodoListHTML(undone, 'undone', done)
    const doneUl = createTodoListHTML(done, 'done', undone)

    wrapper.replaceChildren(undoneUl)
    wrapper.appendChild(doneUl)

    localStorage.setItem('done', JSON.stringify(done))
    localStorage.setItem('undone', JSON.stringify(undone))
}

function createTodoListHTML(list, id, target) {
    const ul = document.createElement('ul')
    ul.id = id

    const h = document.createElement('h2')
    h.appendChild(document.createTextNode(id))
    ul.appendChild(h)

    for (let i = 0; i < list.length; i++) {
        const li = createTodoHTML(list, i, target)

        ul.appendChild(li)
    }

    return ul
}

function createTodoHTML(list, index, target) {
    const li = document.createElement('li')
        
    const checkbox = document.createElement('input')
    checkbox.type = 'checkbox'
    checkbox.addEventListener('change', function () {
        const removed = list.splice(index, 1)
        target.unshift(removed)

        render()
    })
    
    const span = document.createElement('span')
    const todo = document.createTextNode(list[index])
    span.appendChild(todo)
    
    li.appendChild(checkbox)
    li.appendChild(span)

    return li
}

render()
