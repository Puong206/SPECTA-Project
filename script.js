document.addEventListener('DOMContentLoaded', function() {
    const video = document.querySelector('.background-video');
    const swipeItems = document.querySelectorAll('.swipe-item');
    const navLinks = document.querySelectorAll('.nav-links a');
    
    // Video interaction
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
  
    // Smooth scrolling for navigation
    navLinks.forEach(link => {
      link.addEventListener('click', function(e) {
        e.preventDefault();
        
        // Set active class
        navLinks.forEach(navLink => navLink.classList.remove('active'));
        this.classList.add('active');
        
        const targetId = this.getAttribute('href');
        const targetSection = document.querySelector(targetId);
        
        if (targetSection) {
          const offsetTop = targetSection.offsetTop - 120; // Adjust for navbar height
          window.scrollTo({
            top: offsetTop,
            behavior: 'smooth'
          });
        }
      });
    });
  
    // Add animation to swipe items
    swipeItems.forEach((item, index) => {
      // Add delay to stagger animations
      item.style.animationDelay = `${index * 0.1}s`;
      
      item.addEventListener('mouseenter', () => {
        item.style.transform = 'scale(1.05)';
        item.style.boxShadow = '0 10px 20px rgba(0, 0, 0, 0.2)';
      });
    
      item.addEventListener('mouseleave', () => {
        item.style.transform = 'scale(1)';
        item.style.boxShadow = '0 5px 15px rgba(0, 0, 0, 0.1)';
      });
    
      item.addEventListener('click', () => {
        const itemTitle = item.querySelector('div').textContent;
        showProductModal(itemTitle, item.querySelector('img').src);
      });
    });
  
    // Function to show product modal when item is clicked
    function showProductModal(title, imageSrc) {
      // Create modal container
      const modalContainer = document.createElement('div');
      modalContainer.className = 'product-modal';
      
      // Create modal content
      modalContainer.innerHTML = `
        <div class="modal-content">
          <span class="close-modal">&times;</span>
          <h2>${title}</h2>
          <img src="${imageSrc}" alt="${title}">
          <p>Detail merchandise ${title} IT SPECTA 2025.</p>
          <button class="modal-btn">See Details</button>
        </div>
      `;
      
      // Add modal to body
      document.body.appendChild(modalContainer);
      
      // Add styles to modal
      const style = document.createElement('style');
      style.textContent = `
        .product-modal {
          position: fixed;
          top: 0;
          left: 0;
          width: 100%;
          height: 100%;
          background-color: rgba(0, 0, 0, 0.8);
          display: flex;
          justify-content: center;
          align-items: center;
          z-index: 1001;
          opacity: 0;
          transition: opacity 0.3s ease;
        }
        .modal-content {
          background-color: white;
          padding: 30px;
          border-radius: 15px;
          max-width: 500px;
          width: 80%;
          text-align: center;
          position: relative;
          transform: scale(0.8);
          transition: transform 0.3s ease;
        }
        .close-modal {
          position: absolute;
          top: 10px;
          right: 15px;
          font-size: 30px;
          cursor: pointer;
          color: #093880;
        }
        .modal-content h2 {
          color: #093880;
          margin-bottom: 20px;
        }
        .modal-content img {
          max-width: 100%;
          height: auto;
          margin-bottom: 20px;
          border-radius: 10px;
        }
        .modal-content p {
          margin-bottom: 20px;
          color: #333;
        }
        .modal-btn {
          background-color: #093880;
          color: white;
          border: none;
          padding: 10px 20px;
          border-radius: 5px;
          cursor: pointer;
          font-weight: bold;
          transition: background-color 0.3s ease;
        }
        .modal-btn:hover {
          background-color: #eb8317;
        }
      `;
      document.head.appendChild(style);
      
      // Show modal with animation
      setTimeout(() => {
        modalContainer.style.opacity = '1';
        modalContainer.querySelector('.modal-content').style.transform = 'scale(1)';
      }, 10);
      
      // Close modal when clicking close button or outside
      const closeBtn = modalContainer.querySelector('.close-modal');
      closeBtn.addEventListener('click', () => {
        modalContainer.style.opacity = '0';
        modalContainer.querySelector('.modal-content').style.transform = 'scale(0.8)';
        setTimeout(() => {
          document.body.removeChild(modalContainer);
        }, 300);
      });
      
      // Close when clicking outside the modal content
      modalContainer.addEventListener('click', (e) => {
        if (e.target === modalContainer) {
          closeBtn.click();
        }
      });
    }
  
    // Animate elements on scroll
    const animateOnScroll = () => {
      const elements = document.querySelectorAll('.section-title, .section-divider, .it-specta-description');
      
      elements.forEach(element => {
        const elementTop = element.getBoundingClientRect().top;
        const windowHeight = window.innerHeight;
        
        if (elementTop < windowHeight - 100) {
          element.classList.add('fade-in');
        }
      });
    };
  
    // Initial check for elements in view
    animateOnScroll();
    
    // Listen for scroll events
    window.addEventListener('scroll', animateOnScroll);
  });