const video = document.querySelector('.background-video');
const images = document.querySelectorAll('.swipe-item img, .swipe-container_semnas, .swipe-container_funrun');

video.addEventListener('click', () => {
    if (video.paused) {
      video.play();
    } else {
      video.pause();
    }
  });

  video.addEventListener('ended', () => {
    video.currentTime = 0;
    video.play();
  });

  images.forEach((image) => {
    image.addEventListener('mouseenter', () => {
      image.style.transform = 'scale(1.1)'; 
      image.style.boxShadow = '0 10px 20px rgba(0, 0, 0, 0.3)';
    });
  
    image.addEventListener('mouseleave', () => {
      image.style.transform = 'scale(1)';
      image.style.boxShadow = 'none';
    });
  
    image.addEventListener('click', () => {
      alert(`You clicked on ${image.className}`);
    });
  });