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
        if(userDom){
            userOnline.remove()
        }
    })

let btnSendMassage = document.querySelector('#btnSendMassage')
let inputMassage = document.querySelector('#inputMessage')

btnSendMassage.addEventListener('click',function(){
    let massage = inputMassage.value
    console.log(inputMassage);
    
    window.axios.post(routeMassage, {massage})
    .then(function(res){
        console.log(res.data);
        
    })
})