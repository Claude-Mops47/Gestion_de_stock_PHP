# import matplotlib.pyplot as pyp_lot

# labels = ('Python', 'Java', 'Scala', 'C#')
# sizes = [50,30, 10, 20]

# pyp_lot.pie(sizes,labels=labels, autopct='%1.f%%',counterclock=False, startangle=90)

# pyp_lot.show()


# Calculator !!
# print(eval(input("Enter Expression:")))

#  Game
from random import choice
from time import sleep

# options of items
reel = ["cherry", "bell","lemon","grape"]

# variable to show many times user has play
play_times = int(1)

# user enters in amount of money
money = int(input("Enter in a amount of money: "))

# while loop variable
looping = True

# wining variable
credit = int(money)

# for if user wants to play again
def playAgain():
    credit = int(money)
    looping = True

while looping:
    # Add 50 to credit so user gets more credit
    credit = credit + 50

    # select random reel
    reel_1 = choice(reel)
    reel_2 = choice(reel)
    reel_3 = choice(reel)
    reel_4 = choice(reel)

    #  prints out each reel to the screen
    print(f"You have had {play_times} rounds")
    print(reel_1, reel_2, reel_3, reel_4)
    print()