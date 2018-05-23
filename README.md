# API Plattform example app

This shiny little app should display the usage of api plattform. It was shown step by step in a talk at several user groups. As background, the domain is
a private app of mine, where i created an angular frontend to manage money and consumption values for my family.

## Usage/Install

```bash
git clone ... example-app
cd example-app
docker-compose up -d
```

touch your app at `http://0.0.0.0:9093/api`. 

## Known Issue

At the moment i am unabel to remove the default nginx config, which would block ours, so you have to go into the container and remove the old default config:

```bash
docker exec -it example-nginx bash
rm /etc/nginx/conf.d/default.conf
service nginx restart
docker-compose up -d # the container would be down else
```

## Steps to Reproduce

1. Create both entities in a ORM manner as you usedd to do it. 
2. Add `@ApiRecource` class annotation to both. So both entities will be available then
3. Add Groups for normalisation/denomalisation to output embedded resources

You should follow and try your work watching the `/api` page with its docs.
