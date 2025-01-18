import os

# Directory containing your images
images_dir = "./"

for filename in os.listdir(images_dir):
    if "-removebg-preview" in filename:
        old_path = os.path.join(images_dir, filename)
        new_filename = filename.replace("-removebg-preview", "")
        new_path = os.path.join(images_dir, new_filename)

        os.rename(old_path, new_path)
        print(f"Renamed: {filename} -> {new_filename}")
