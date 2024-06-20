document.getElementById('searchBtn').addEventListener('click', function() {
    // 取消自动填充
    // document.getElementById('searchBox').value = ''
    // 显示提示消息
    alert('已搜索，请等待数秒。');

    // 刷新页面
    location.reload();
});



    // 假设API返回的结构中有"content"字段，提取该字段的内容
    var content = results.content || 'No content found in the response.';
    preElement.textContent = content;

    outputContent.appendChild(preElement);
}