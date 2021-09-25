<script>
    document.getElementById('send_comment').addEventListener('click', async () => {
        let subject = document.getElementById('subject').value, content = document.getElementById('content').value;
        if (subject.length == 0 || content.length == 0)
            return;

        await fetch('/api/article/comment', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json'
            },
            body: JSON.stringify({
                article_id: document.getElementById('article_id').value,
                subject: subject,
                body: content
            })
        });

        document.getElementById('comment_container').innerText = "Ваше сообщение успешно отправлено";
    });

    document.getElementById('like').addEventListener('click', async () => {
        const response = await fetch('/api/article/like', {
            method: 'PATCH',
            headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json'
            },
            body: JSON.stringify({
                article_id: document.getElementById('article_id').value
            })
        });

        if (response.status !== 200)
            return;
            
        const parse = await response.json();
        document.getElementById('like_count').innerText = parse.count;
    });

    if (document.getElementById('viewers_count') != null) {
        setTimeout(async () => {
            const response = await fetch('/api/article/view', {
                method: 'PATCH',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json'
                },
                body: JSON.stringify({
                    article_id: document.getElementById('article_id').value
                })
            });

            if (response.status !== 200)
                return;
                
            const parse = await response.json();
            document.getElementById('viewers_count').innerText = parse.count;
        }, 5000);
    }
</script>