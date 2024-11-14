import axios from 'axios';
import './bootstrap';

let userOnline = document.querySelector('#user-online')
window.Echo.join('chat.' + conversationID)
    .here(users => {
        console.log(users);
        let UI = ''
        users.forEach(user => {
            if (userID != user.id) {
                UI += `<a class="text-body d-block user-${user.id}">
                        <div class="chat-users" >
                            <div class="flex-grow-1 overflow-hidden">
                                <h5 class="mt-0 mb-0 fs-13">
                                    <span
                                        class="float-end text-muted fs-12"></span>
                                        ${user.name} ( Online )
                                </h5>
                            </div>
                        </div>
                    </a>`
            }
        });
        userOnline.insertAdjacentHTML('afterbegin', UI)
    })
    .joining(user => {
        console.log(user);
        let UI = `<a class="text-body d-block user-${user.id}">
                        <div class="chat-users" >
                            <div class="flex-grow-1 overflow-hidden">
                                <h5 class="mt-0 mb-0 fs-13">
                                    <span
                                        class="float-end text-muted fs-12"></span>
                                        ${user.name} ( Online )
                                </h5>
                            </div>
                        </div>
                    </a>`
        userOnline.insertAdjacentHTML('afterbegin', UI)
    })
    .leaving(user => {
        console.log(user);
        let userDom = document.querySelector(`.user-${user.id}`)
        if (userDom) {
            userOnline.remove()
        }
    })
    .listen('MessageSent', function (event) {
        updateUI(event)
    })

let content = document.querySelector('#even-4')
function updateUI(event) {
    let odd = event.message.user_id == userID ? 'odd' : ''
    let UI = `<li class="chat-group ${odd}"><div class="chat-body">
                <div>
                    <h6 class="d-inline-flex">User - ${event.message.user_id}</h6>
                </div>

                <div class="chat-message">
                    <p>${event.message.content}</p>
                </div>
            </div></li>`
    content.insertAdjacentHTML('beforebegin', UI)
}