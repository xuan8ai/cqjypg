// 页面加载完成后自动填充搜索框
window.onload = function() {
    document.getElementById('searchBox').value = '帮我写十篇以老师视角的学生网络安全专业学习情况表现说明';
};

document.getElementById('searchBtn').addEventListener('click', function() {
    // 显示提示消息
    alert('已搜索，请等待数秒。');

    // 清空之前的输出
    var outputContent = document.getElementById('outputContent');
    outputContent.innerHTML = '';

    var searchBox = document.getElementById('searchBox');
    var searchQuery = searchBox.value;
    var apiUrl = 'http://ovoa.cc/api/Bing.php?msg=' + encodeURIComponent(searchQuery) + '&model=down&type=json';

    fetch(apiUrl)
        .then(response => response.json())
        .then(data => displayResults(data))
        .catch(error => console.error('Error:', error));
});

function displayResults(results) {
    var outputContent = document.getElementById('outputContent');
    var preElement = document.createElement('pre');

    // 假设API返回的结构中有"content"字段，提取该字段的内容
    var content = results.content || 'No content found in the response.';
    preElement.textContent = content;

    outputContent.appendChild(preElement);
}