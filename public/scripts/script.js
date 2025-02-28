async function uploadFile() {
    const fileInput = document.getElementById('fileInput');
    const file = fileInput.files[0];
    const formData = new FormData();
    formData.append('file', file);

    const response = await fetch('http://127.0.0.1:8000/upload/', {
        method: 'POST',
        body: formData
    });

    const result = await response.json();
    document.getElementById('output').textContent = JSON.stringify(result, null, 2);
}
