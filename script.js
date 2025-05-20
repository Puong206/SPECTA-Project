/**
 * IT SPECTA Main JavaScript
 * Handles interactive elements and animations
 */
document.addEventListener('DOMContentLoaded', function() {
  // Cache DOM elements
  const elements = {
    video: document.querySelector('.background-video'),
    swipeItems: document.querySelectorAll('.swipe-item'),
    navLinks: document.querySelectorAll('.nav-links a'),
    sectionTitles: document.querySelectorAll('.section-title'),
    animatedElements: document.querySelectorAll('.section-title, .section-divider, .it-specta-description')
  };
  
  // Initialize libraries
  initializeLibraries();
  
  // Setup event listeners
  setupEventListeners();
  
  /**
   * Initialize external libraries
   */
  function initializeLibraries() {
    // Initialize AOS
    AOS.init({
      duration: 800,
      easing: 'ease-in-out',
      once: false,
      mirror: true,
      disable: 'mobile'
    });
  }
  
  /**
   * Setup all event listeners
   */
  function setupEventListeners() {
    // Video interaction
    setupVideoInteraction();
    
    // Navigation smooth scrolling
    setupNavigation();
    
    // Swipe items interactions
    setupSwipeItems();
    
    // Scroll animation
    window.addEventListener('scroll', handleScroll);
  }
  
  /**
   * Video interaction handlers
   */
  function setupVideoInteraction() {
    elements.video.addEventListener('click', () => {
      if (elements.video.paused) {
        elements.video.play();
      } else {
        elements.video.pause();
      }
    });
  
    elements.video.addEventListener('ended', () => {
      elements.video.currentTime = 0;
      elements.video.play();
    });
  }
  
  /**
   * Smooth scrolling navigation
   */
  function setupNavigation() {
    elements.navLinks.forEach(link => {
      link.addEventListener('click', function(e) {
        e.preventDefault();
        
        // Set active class
        elements.navLinks.forEach(navLink => navLink.classList.remove('active'));
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
  }
  
  /**
   * Handle scroll events for animations
   */
  function handleScroll() {
    // Add fade-in class to elements in viewport
    animateElementsOnScroll();
  }
  
  /**
   * Setup swipe items animations and interactions
   */
  function setupSwipeItems() {
    elements.swipeItems.forEach((item, index) => {
      // Add delay to stagger animations
      item.style.animationDelay = `${index * 0.1}s`;
      
      // Click to show modal
      item.addEventListener('click', () => {
        const itemTitle = item.querySelector('div').textContent;
        showProductModal(itemTitle, item.querySelector('img').src);
      });
    });
  }
  
  /**
   * Animate elements when they enter the viewport
   */
  function animateElementsOnScroll() {
    elements.animatedElements.forEach(element => {
      const elementTop = element.getBoundingClientRect().top;
      const windowHeight = window.innerHeight;
      
      if (elementTop < windowHeight - 100) {
        element.classList.add('fade-in');
      }
    });
  }
  
  /**
   * Display modal for product details
   */
  function showProductModal(title, imageSrc) {
    // Create modal container
    const modalContainer = document.createElement('div');
    modalContainer.className = 'product-modal';
    
    // Create modal content
    modalContainer.innerHTML = `
      <div class="modal-content">
        <span class="close-modal">&times;</span>
        <div class="modal-wrapper">
          <h2>${title}</h2>
          <div class="modal-image-container">
            <img src="${imageSrc}" alt="${title}">
          </div>
          <p>Detail merchandise ${title} IT SPECTA 2025.</p>
          <button class="modal-btn">See Details</button>
        </div>
      </div>
    `;
    
    // Add modal to body
    document.body.appendChild(modalContainer);
    
    // Add styles
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
        background: linear-gradient(135deg, #ffffff, #f5f5f5);
        padding: 40px;
        border-radius: 15px;
        max-width: 500px;
        width: 80%;
        text-align: center;
        position: relative;
        transform: scale(0.8);
        transition: transform 0.5s cubic-bezier(0.23, 1, 0.32, 1);
        box-shadow: 0 30px 100px rgba(0, 0, 0, 0.3);
      }
      .close-modal {
        position: absolute;
        top: 10px;
        right: 15px;
        font-size: 30px;
        cursor: pointer;
        color: #093880;
        z-index: 2;
        transition: all 0.3s ease;
      }
      .close-modal:hover {
        transform: rotate(90deg);
        color: #eb8317;
      }
      .modal-content h2 {
        color: #093880;
        margin-bottom: 20px;
        font-size: 32px;
      }
      .modal-image-container {
        overflow: hidden;
        border-radius: 10px;
        margin-bottom: 20px;
      }
      .modal-content img {
        max-width: 100%;
        height: auto;
        border-radius: 10px;
        transition: transform 0.5s ease;
      }
      .modal-content img:hover {
        transform: scale(1.05);
      }
      .modal-content p {
        margin-bottom: 25px;
        color: #333;
        font-size: 18px;
      }
      .modal-btn {
        background-color: #093880;
        color: white;
        border: none;
        padding: 12px 25px;
        border-radius: 30px;
        cursor: pointer;
        font-weight: bold;
        font-size: 16px;
        transition: all 0.3s ease;
        box-shadow: 0 5px 15px rgba(9, 56, 128, 0.3);
      }
      .modal-btn:hover {
        background-color: #eb8317;
        transform: translateY(-5px);
        box-shadow: 0 10px 25px rgba(235, 131, 23, 0.4);
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
      }, 500);
    });
    
    // Close when clicking outside the modal content
    modalContainer.addEventListener('click', (e) => {
      if (e.target === modalContainer) {
        closeBtn.click();
      }
    });
  }
});