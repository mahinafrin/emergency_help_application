const { default: axios } = require("axios");
const { isEmpty } = require("lodash");

$(document).ready(function () {
    fetchAllMessages();
    $(document).on("click", "#sendMessageBtn", function () {
        inputMessage();
    });

    $(document).keypress(function (e) {
        if (e.which == 13) {
            inputMessage();
        }
    });
    autoScroller();
});

let inputMessage = () => {
    let message = $("#messageInput").val();
    if (message) {
        axios.post("message/send", { message }).then((res) => {
            fetchAllMessages();
            $("#messageInput").val("");
            autoScroller();
        });
    }
};

let fetchAllMessages = () => {
    axios.get("/messages/fetch").then((res) => {
        let countReply = 0;
        $("#printMsg").html(
            res.data.data.map((msg) => {
                return `<div class="d-flex flex-row justify-content-end mb-4 pt-1 msg">
                 <div>
                   <p class="small p-2 me-3 mb-1 text-white rounded-3 bg-primary">${
                       msg.message
                   }</p>
                 </div>
                 <img src="/image/client.png" alt="avatar 1" style="width: 45px; height: 100%;">
               </div>

               ${
                   !isEmpty(msg.replies)
                       ? `<div class="d-flex flex-row justify-content-start msg">
                           <img src="/image/doctor.jpg" alt="avatar 1" style="width: 45px; height: 100%;">
                           <div>
                           ${msg.replies
                               .map((reply) => {
                                   if (reply.replied_at == null) countReply++;
                                   return `<p class="small p-2 ms-3 mb-1 rounded-3" style="background-color: #f5f6f7;">${reply.message}</p>`;
                               })
                               .join(" ")}
                           </div>
                         </div>`
                       : ""
               }
               `;
            })
        );
        $("#messageCount").text(countReply);
    });
};

let autoScroller = () => {
    setTimeout(() => {
        let boxHeight = $("#printMsg").height();
        if (boxHeight) {
            let nodes = document.getElementById("printMsg").childElementCount;
            $("#printMsg").animate(
                { scrollTop: boxHeight + 100 * nodes },
                1000
            );
        }
    }, 100);
};
