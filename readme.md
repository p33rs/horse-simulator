# Horse Simulator

It is a farm with horses on it.

## Installation
1. run package managers
1. `public` is webroot
1. horse

## Planned Features
(In case I forget what I was working on here.)
A full-featured Horse Simulation browser game. The four main entities will be:
* **Player** A user. Generates turns on a fixed interval, using a cron jobe.
* **Horse** A player may have many horses, but a horse has only one player.
* **Flair** Upgrades for horses
* **Doge** Upgrades for players

The player uses money to purchase a horse. The horse may work (generates small XP, medium cash) or train (generates
medium cash, small XP), at the cost of one player turn. The horse may also engage in combat with other horses, which
results in an XP boost (higher for the winning horse; always scaled against the opposing horse's level).

Purchasing Flair (horse equipment) and Doge (helpers for your farm) costs some amount of money and, sometimes, turns.

Eventually, would like to flesh this out into something approximating earth:2025.
