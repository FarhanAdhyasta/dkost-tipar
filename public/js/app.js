    function zoomImage(event, element) {
        const rect = element.getBoundingClientRect();
        const scaleX = (event.clientX - rect.left) / element.offsetWidth;
        const scaleY = (event.clientY - rect.top) / element.offsetHeight;
        element.querySelector('img').style.transformOrigin = `${scaleX * 100}% ${scaleY * 100}%`;
        element.querySelector('img').style.transform = 'scale(1.1)';
    }
    