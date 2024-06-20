document.getElementById('searchBtn').addEventListener('click', function() {
    var selectedOption = document.getElementById('searchOptions').value;

    // 确保用户选择了选项后再进行搜索
    if (!selectedOption) {
        alert('请选择搜索选项！');
        return;
    }

    // 构建API请求URL
    var apiUrl = 'http://ovoa.cc/api/Bing.php?msg=' + encodeURIComponent(selectedOption) + '&model=down&type=json';

    // 使用Fetch API发送GET请求
    fetch(apiUrl)
    .then(response => {
        // 检查响应是否成功
        if (!response.ok) {
            throw new Error('网络响应 was not ok');
        }
        return response.json(); // 解析JSON数据
    })
    .then(data => {
        // 将API返回的数据插入到页面上
        document.getElementById('searchResult').textContent = JSON.stringify(data, null, 2);
    })
    .catch(error => {
        // 处理错误情况
        console.error('发生错误:', error);
        alert('搜索失败，请重试！');
    });
});