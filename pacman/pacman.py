import pygame

# Initialise pygame
pygame.init()

# Set window size and title
size = (700, 500)
screen = pygame.display.set_mode(size)
pygame.display.set_caption("Pac-Man")

# Load and set background image
bg = pygame.image.load("bg.png")

# Load and set Pac-Man image
pacman = pygame.image.load("pacman.png")
pacman_x = 50
pacman_y = 50

# Set game loop
running = True
while running:
    for event in pygame.event.get():
        if event.type == pygame.QUIT:
            running = False

    # Move Pac-Man on arrow key press
    keys = pygame.key.get_pressed()
    if keys[pygame.K_LEFT]:
        pacman_x -= 5
    if keys[pygame.K_RIGHT]:
        pacman_x += 5
    if keys[pygame.K_UP]:
        pacman_y -= 5
    if keys[pygame.K_DOWN]:
        pacman_y += 5

    # Draw background and Pac-Man on screen
    screen.blit(bg, (0, 0))
    screen.blit(pacman, (pacman_x, pacman_y))
    pygame.display.flip()

# Quit game
pygame.quit()
