 #include <WiFi.h>
#include <PubSubClient.h>

#define MQ135_PIN 34  // Pino onde o A0 do MQ-135 está conectado
const int THRESHOLD = 1500;  // Limite para detecção de gás

// Configurações do WiFi
const char* ssid = "darkmoon";
const char* password = "cafecafe10";
// Configurações do MQTT
const char* mqtt_server = "192.168.2.198";
const char* mqtt_topic = "DadosGas";
const char* mqtt_sensor_topic = "ValoresGas"; //comentario anti zika

WiFiClient espClient;
PubSubClient client(espClient);

void setup_wifi() {
  delay(10);
  Serial.println();
  Serial.print("Conectando-se a ");
  Serial.println(ssid);

  WiFi.begin(ssid, password);

  unsigned long startTime = millis();
  while (WiFi.status() != WL_CONNECTED) {
    delay(500);
    Serial.print(".");
    if (millis() - startTime > 30000) {  // Timeout de 30 segundos
      Serial.println("Falha ao conectar ao WiFi");
      ESP.restart();  // Reinicia o ESP32 para tentar novamente
    }
  }

  Serial.println("");
  Serial.println("WiFi conectado");
  Serial.print("Endereço IP: ");
  Serial.println(WiFi.localIP());
}

void reconnect() {
  // Loop até que estejamos conectados
  while (!client.connected()) {
    Serial.print("Tentando conectar ao MQTT...");
    // Tenta conectar
    if (client.connect("ESP32Client")) {
      Serial.println("Conectado ao MQTT");
    } else {
      Serial.print("Falha ao conectar, rc=");
      Serial.print(client.state());
      Serial.println(" Tentando novamente em 5 segundos");
      // Espera 5 segundos antes de tentar novamente
      delay(5000);
    }
  }
}

void setup() {
  Serial.begin(9600);
  setup_wifi();
  client.setServer(mqtt_server, 1883);
}

void loop() {
  if (!client.connected()) {
    reconnect();
  }
  client.loop();

  int sensorValue = analogRead(MQ135_PIN);
  Serial.print("Valor do sensor: ");
  Serial.println(sensorValue);

  String message;
  if (sensorValue > THRESHOLD) {
    message = "Gas Detectado";
    Serial.println("Gás Detectado");
  }

  // Publica o valor do sensor no novo tópico MQTT
  if (client.publish(mqtt_sensor_topic, String(sensorValue).c_str())) {
    Serial.println("Valor do sensor publicado com sucesso");
  } else {
    Serial.println("Falha ao publicar o valor do sensor");
  }
  //alteração no codigo se der zika


  // Publica a mensagem no tópico MQTT
  if (client.publish(mqtt_topic, message.c_str())) {
    Serial.println("Mensagem publicada com sucesso");
  } else {
    Serial.println("Falha ao publicar a mensagem");
  }

  delay(2000);  // Espera 2 segundos antes de ler novamente
}
