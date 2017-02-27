FROM whitis01/norway
COPY . /var/www/php
RUN echo "cd /var/www/php" >> ~/.bashrc

