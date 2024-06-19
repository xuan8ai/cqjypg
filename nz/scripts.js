// scripts.js
function loadAndShowAnnouncement() {
    fetch('https://xuan8ai.github.io/cqjypg/nz/gonggao.txt') // 请将此URL替换为你的服务器地址
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.text();
        })
        .then(data => {
            if (data.trim() !== '') { // 检查数据是否为空
                document.getElementById('modalAnnouncement').innerText = data;
                document.getElementById('myModal').style.display = 'block';
            } else {
                console.log('Announcement is empty.');
            }
        })
        .catch(error => {
            console.error('Error loading announcement:', error);
            // 可以在这里添加错误处理，例如显示一个默认的公告内容
        });
}

function closeModal(event) {
    if (event) {
        event.stopPropagation(); // 阻止事件冒泡
    }
    document.getElementById('myModal').style.display = 'none';
}
