#!/usr/bin/env bash

sudo gem install mailcatcher
sudo /usr/bin/env mailcatcher --no-quit --foreground --ip=0.0.0.0 &