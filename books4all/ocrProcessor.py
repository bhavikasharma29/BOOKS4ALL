import sys
import json
import pytesseract
from PIL import Image
from langdetect import detect
from googletrans import Translator

# Mapping of languages to regions
language_to_region = {
    'te': 'Andhra Pradesh or Telangana',
    'ml': 'Kerala',
    'mr': 'Maharashtra',
    'ta': 'Tamil Nadu',
    'kn': 'Karnataka',
    'bn': 'West Bengal',
    'gu': 'Gujarat',
    'pa': 'Punjab',
    'hi': 'North India',
}

def process_ocr(image_path):
    try:
        image = Image.open(image_path)
        text = pytesseract.image_to_string(image)

        # Detect language
        detected_language = detect(text) if text.strip() else 'unknown'

        # Translate if not in English
        translator = Translator()
        translated_text = text
        if detected_language != 'en' and detected_language != 'unknown':
            translation = translator.translate(text, src=detected_language, dest='en')
            translated_text = translation.text

        # Identify region
        region = language_to_region.get(detected_language, 'Unknown Region')

        result = {
            'text': text,
            'detected_language': detected_language,
            'translated_text': translated_text,
            'region': region
        }
        print(json.dumps(result))  # Output JSON for PHP
    except Exception as e:
        print(json.dumps({"error": str(e)}))  # Return error message to PHP

if __name__ == "__main__":
    image_path = sys.argv[1]  # Get image file path from PHP
    process_ocr(image_path)
