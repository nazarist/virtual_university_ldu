FROM node:16-alpine

RUN mkdir -p /app
WORKDIR /app

COPY ./client/package.json .

RUN npm install -g babel babel-runtime babel-register mocha nodemon \
    && npm install \
    && chown -R node:node /app/node_modules

EXPOSE 3000

CMD [ "npm", "start" ]