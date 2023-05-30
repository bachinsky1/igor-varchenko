
import 'bootstrap'
interface Param {
    page?: number,
    count?: number,
    offset?: number
}

const rowsCount = 6

const buildUrl = (param: Param): string => {
    let url = `${location.origin}/api/v1/users?`

    if (param.count !== undefined) {
        url += `count=${param.count}&`
    }

    if (param.page !== undefined) {
        url += `page=${param.page}&`
    }

    if (param.offset !== undefined) {
        url += `offset=${param.offset}&`
    }

    // Remove the trailing '&' character
    url = url.slice(0, -1)

    return url
}

const fetchData = async (param: Param): Promise<void> => {
    const url = buildUrl(param)
    const tbody = document.querySelector('#tBody') as HTMLTableElement
    tbody.innerHTML = `<tr><td colspan="7"><h3 class="text-center w-100">Loading data...</h3><td></tr>`
    const response = await fetch(url)
    const data = await response.json()

    const users = data.users

    if (!!users == false) {
        tbody.innerHTML = `<tr><td colspan="7"><h3 class="text-center w-100">No data</h3><td></tr>`
        return
    }
    
    renderTableBody(users)

    renderTableFooter({
        page: data.page,
        total_pages: data.total_pages,
        total_users: data.total_users,
        count: data.count,
        links: data.links,
    })
}

const renderTableBody = (users: any): void => {
    const tbody = document.querySelector('#tBody') as HTMLTableElement
    tbody.innerHTML = ''

    for (const user of users) {

        const tr: HTMLTableRowElement = document.createElement('tr')

        const id = document.createElement('td')
        const photo = document.createElement('td')
        const img = document.createElement('img')
        img.setAttribute('src', user.photo)
        img.setAttribute('width', '20rem')
        photo.appendChild(img)
        const name = document.createElement('td')
        const email = document.createElement('td')
        const phone = document.createElement('td')
        const position = document.createElement('td')
        const button = document.createElement('td')

        id.textContent = user.id || ''

        name.textContent = user.name || ''
        email.textContent = user.email || ''
        phone.textContent = user.phone || ''
        position.textContent = user.position || ''

        const link = document.createElement('a') as HTMLAnchorElement

        link.setAttribute('href', '#')
        link.setAttribute('data-bs-toggle', 'modal')
        link.setAttribute('data-bs-target', '#openUser') 
        link.textContent = `Open`
        link.addEventListener('click', async (event) => {
            event.preventDefault()
            const modalBody = document.querySelector('#modalBody') as HTMLElement
            modalBody.innerHTML = `<h3 class="text-center">Loading data...</h3>`
            const response = await fetch(`${location.origin}/api/v1/users/${user.id}`)
            const data = await response.json()

            modalBody.innerHTML = `
                <p><img src="${data.user.photo}" /></p>
                <p>User ID: ${data.user.id}</p>
                <p>Name: ${data.user.name}</p>
                <p>Email: ${data.user.email}</p>
                <p>Phone: ${data.user.phone}</p>
                <p>Position: ${data.user.position}</p>
            `
        })

        button.appendChild(link)

        tr.appendChild(id)
        tr.appendChild(photo)
        tr.appendChild(name)
        tr.appendChild(email)
        tr.appendChild(phone)
        tr.appendChild(position)
        tr.appendChild(button)

        tbody?.appendChild(tr)
    }
}

const renderTableFooter = (data: any): void => {
    const tfoot = document.querySelector('#tFoot') as HTMLElement
    tfoot.innerHTML = ''

    const nav = document.createElement('nav') as HTMLElement

    const ul = document.createElement('ul') as HTMLElement
    ul.classList.add(...['pagination', 'justify-content-center'])

    let li = document.createElement('li') as HTMLElement
    li.classList.add(...['page-item'])

    let link = document.createElement('a') as HTMLAnchorElement
    link.setAttribute('href', '#')
    link.classList.add(...['page-link'])
    link.textContent = `Previous`
    link.addEventListener('click', (event) => {
        event.preventDefault()
        const page = Number(data.page)
        fetchData({
            page: page > 1 ? page - 1 : page,
            count: rowsCount
        })
    })

    li.appendChild(link)
    ul.appendChild(li)

    for (let index = 1; index <= data.total_pages; index++) {
        const li = document.createElement('li') as HTMLElement

        li.classList.add(...['page-item'])
        const link = document.createElement('a') as HTMLAnchorElement

        link.setAttribute('href', '#')
        link.classList.add(...['page-link'])
        link.textContent = `${index}`
        link.dataset.row_id = index.toString()

        link.addEventListener('click', (event) => {
            event.preventDefault()
            fetchData({
                page: index,
                count: rowsCount
            })
        })

        li.appendChild(link)
        ul.appendChild(li)
    }

    li = document.createElement('li') as HTMLElement
    li.classList.add(...['page-item'])
    link = document.createElement('a') as HTMLAnchorElement
    link.setAttribute('href', '#')
    link.classList.add(...['page-link'])
    link.textContent = `Next`

    link.addEventListener('click', (event) => {
        event.preventDefault()
        const page = Number(data.page)
        fetchData({
            page: page < data.total_pages ? page + 1 : page,
            count: rowsCount
        })
    })

    li.appendChild(link)
    ul.appendChild(li)

    nav.appendChild(ul)
    tfoot.appendChild(nav)
}

fetchData({
    page: 1,
    count: rowsCount,
})

