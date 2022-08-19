const pwd = document.querySelector('#pwd')
const c_pwd = document.querySelector('#c-pwd')

const show = document.querySelector("#show")

show.onclick = () => {
    if (pwd.type === "password") {
        pwd.type = "text"
    } else {
        pwd.type = "password"
    }

    if (c_pwd.type === "password") {
        c_pwd.type = "text"
    } else {
        c_pwd.type = "password"
    }
}