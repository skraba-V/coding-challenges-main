# GREEN TO HOME Signature Full Stack Challenge

## Getting started

### Install Silverstripe Dependencies via Composer
```
docker run --rm --interactive --tty \
  --volume $PWD/silverstripe:/app \
  composer:2.3.9 install --ignore-platform-req=ext-intl
```

### Docker Compose
MySQL and Silverstripe can be started via Docker. Run the following Terminal command from this folder. 

*Note: If you are using an ARM Mac, you need to comment in line `platform: linux/amd64 #enable if M1 Mac` in `docker-compose.yml`.*

```
docker compose up
```

After startup you should have the following endpoints available:
* SilverStripe CMS (Port: 8080)
* Adminer (Port: 8081)

## SilverStripe
When starting up the first time, please clear cache and build database model, before you log into the administration.

### Clear Cache
* [http://localhost:8080/?flush](http://localhost:8080/?flush)

### Build Database Model
* [http://localhost:8080/dev/build](http://localhost:8080/dev/build)

### SilverStripe Administration
SilverStripe Administration is available at [http://localhost:8080/admin](http://localhost:8080/admin)

User: `admin`

Password: `admin`

## Adminer
Adminer is a lightweight MySQL database browser. Open [http://localhost:8081/?server=db&username=root&db=gth](http://localhost:8081/?server=db&username=root&db=gth) to browse.
Username and Password is: `root`

## React
New (empty) app was created with `create-react-app`. Use `yarn` or `npm` to install dependencies.

## Docs & Tutorials

### Silverstripe

* [Introduction to the Data Model and ORM](https://docs.silverstripe.org/en/4/developer_guides/model/data_model_and_orm/)
* [Introduction to ModelAdmin
](https://www.silverstripe.org/learn/lessons/v4/introduction-to-modeladmin-1)
* [RestAPI Extension](https://github.com/silverstripe/silverstripe-restfulserver)


### React
* [Create React App](https://create-react-app.dev/)
* Package: [react-signature-canvas](https://www.npmjs.com/package/react-signature-canvas)
* [Proxying API Requests in Development](https://create-react-app.dev/docs/proxying-api-requests-in-development/)

## Helpful Tools
* [base64-to-image-converter](https://codebeautify.org/base64-to-image-converter)
* [CORS Issues?](https://create-react-app.dev/docs/proxying-api-requests-in-development/)


# Challenge
## Schritt 1
Erstellen Sie ein Silverstripe (PHP) Backend Datenmodell zur Speicherung der Sendungsinformationen (Paketnummer, Name des Empf??ngers, ???) 

Erstellen Sie eine Klasse Parcel vom Typ `SilverStripe\ORM\DataObject`.

Definieren Sie folgende Datenbankattribute:
* `ParcelReferenceId` vom Typ `Varchar`
* `RecipientName` vom Typ `Varchar`
* `RecipientSignature` vom Typ `Text` (Signatur soll als PNG File und Base64 Kodierung in der Datenbank gespeichert werden)
* `DeliveryTimestamp` vom Typ `Datetime`
Geben Sie ??ber die Funktion `getCMSFields()` f??r jedes Datenbankattribut geeignete SilverStripe Formfelder zur??ck

Definieren Sie folgende Felder als SilverStripe `summary_fields`:
* `ParcelReferenceId`
* `RecipientName`
* `DeliveryTimestamp`

Erweitern Sie den `ModelAdmin`, sodass Ihre Klasse `Parcel` in der Administrationsoberfl??che angezeigt wird. ([Tipp!](https://docs.silverstripe.org/en/4/developer_guides/customising_the_admin_interface/))

Rufen Sie den SilverStripe [Build](http://localhost:8080/dev/build) und [Flush](http://localhost:8080/?flush) Mechanismus auf und verifizieren Sie, dass Ihr Typ in der Datenbank angelegt wurde und im SilverStripe Admin erscheint.

Erstellen Sie eine Sendung mit einer beliebigen `ParcelReferenceId`.


## Schritt 2
Erstellen Sie eine JSON Rest-Schnittstelle in Silverstripe, welche die Sendungen listet und eine Aktualisierung der Sendungsinformationen zul??sst.

Stellen Sie die Klasse `Parcel` als REST-Schnittstelle zur Verf??gung.
Entnehmen Sie der Dokumentation von [restfulserver](https://github.com/silverstripe/silverstripe-restfulserver), wie Sie die Klasse `Parcel` (Schritt 1) als Schnittstelle freischalten k??nnen.

Verifizieren Sie, dass der Endpunkt
```
GET http://localhost:8080/api/v1/Parcel
```

verf??gbar ist.


## Schritt 3
Erstellen Sie eine React Applikation, ??hnlich wie im Wireframe abgebildet, welche Empf??ngername und Unterschrift einer Sendung an die Schnittstelle aus Schritt 2 ??bermittelt.

`create-react-app` wurde zur Erstellung des Ordners `react-frontend` verwendet und ist startf??hig. (https://github.com/facebook/create-react-app)

Installieren Sie das npm Package `axios` f??r die Schnittstellenkommunikation mit dem SilverStripe Backend.

Installieren Sie das npm Package `react-signature-canvas`, welches eine fertige React-Komponente mit einem Unterschriftfeld beinhaltet.

Nutzen Sie `axios`, um die Informationen der ersten Lieferung ??ber die Schnittstelle abzufragen.

_TIPP: Um CORS Problemen vorzubeugen, nutzen Sie das Proxy Attribut in der package.json_

In ein Textfeld kann der Name des Empf??ngers eingetragen werden, darunter f??gen Sie die Unterschrift-Komponente und einen Button ???Paket??bernahme ??bermitteln??? ein.

Bei Klick auf den Button wird der Name des Empf??ngers und die Unterschrift der PNG Bilddatei base64 encoded ??ber einen PUT Request in das Backend ??bertragen. Zus??tzlich wird das Attribut DeliveryTimestamp mit aktueller Zeit bef??llt.

Verifizieren Sie, dass die Daten korrekt in das SilverStripe Backoffice ??bermittelt wurden.
